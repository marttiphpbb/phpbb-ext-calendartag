<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\service;

use phpbb\event\dispatcher;
use marttiphpbb\calendartag\util\cnst;
use marttiphpbb\calendartag\service\store;
use phpbb\language\language;

class render
{
	protected $dispatcher;
	protected $store;
	protected $language;
	protected $cache;
	protected $now_jd;

	public function __construct(
		dispatcher $dispatcher,
		store $store,
		language $language
	)
	{
		$this->dispatcher = $dispatcher;
		$this->store = $store;
		$this->language = $language;
		$this->now_jd = unixtojd();
	}

	public function get(array $topic_data):string
	{
		$index = $total = $start_jd = $end_jd = 0;
		$now_jd = $this->now_jd;
		$link = $open = $close = $format = $template = '';

		/**
		 * Event to set calendar event for a topic
		 *
		 * @event
		 * @var	array 	topic_data		changing won't be fed back to calling event
		 * @var int 	now_jd			julian day of today
		 * @var	int		index			(one-based) index of the calendar event (within the topic)
		 * @var int   	total			total of calendar events for this topic
		 * @var int 	start_jd		start julian day of the most relevant calendar event (next, current or last)
		 * @var int 	end_jd			end julian day of the most relevant calendar event
		 */
		$vars = ['topic_data', 'now_jd', 'index', 'total', 'start_jd', 'end_jd'];
		extract($this->dispatcher->trigger_event('marttiphpbb.calendartag.set', compact($vars)));

		if (!$total || !$start_jd || !$end_jd)
		{
			return '';
		}

		$start = cal_from_jd($start_jd, CAL_GREGORIAN);
		$end = cal_from_jd($end_jd, CAL_GREGORIAN);

		$year = $start['year'];
		$month = $start['month'];
		$day = $start['day'];

		/**
		 * Event to set link for calendar view
		 *
		 * @event
		 * @var string 	link		url to the calendar view to set
		 * @var array 	topic_data
		 * @var	int  	year
		 * @var	int		month
		 * @var int   	day
		 * @var int 	start_jd	start julian day
		 * @var int 	end_jd		end julian day
		 * @var int 	now_jd 		julian day of today
		 */
		$vars = ['link', 'topic_data', 'year', 'month', 'day', 'start_jd', 'end_jd', 'now_jd'];
		extract($this->dispatcher->trigger_event('marttiphpbb.calendartag.link', compact($vars)));

		if ($link)
		{
			$open = '<a href="' . $link . '">';
			$close = '</a>';
		}

		$is_now = ($now_jd >= $start_jd) && ($end_jd >= $now_jd);
		$is_after = $end_jd < $now_jd;
		$is_before = $start_jd > $now_jd;

		if ($total > 1)
		{
			if ($is_now)
			{
				$template = $this->store->get_template_multi_now();
			}
			else if ($is_before)
			{
				if ($index === 1)
				{
					$template = $this->store->get_template_multi_first();
				}
				else
				{
					$template = $this->store->get_template_multi_next();
				}
			}
			else if ($is_after)
			{
				$template = $this->store->get_template_multi_last();
			}
		}
		else
		{
			if ($is_before)
			{
				$template = $this->store->get_template_single_before();
			}
			else if ($is_now)
			{
				$template = $this->store->get_template_single_now();
			}
			else if ($is_after)
			{
				$template = $this->store->get_template_single_after();
			}
		}

		if (!$template)
		{
			error_log('ERROR template, topic id: ' . $topic_data['topic_id'] .
				', now: ' . $now_jd . ', start: ' . $start_jd . ', end: ' . $end_jd);
		}

		if ($start['year'] === $end['year'])
		{
			if ($start['month'] == $end['month'])
			{
				if ($start['day'] === $end['day'])
				{
					$format = $this->store->get_format_same_day();
				}
				else
				{
					$format = $this->store->get_format_diff_day();
				}
			}
			else
			{
				$format = $this->store->get_format_diff_moth();
			}
		}
		else
		{
			$format = $this->store->get_format_diff_year();
		}

		$start_month_abbrev = $start['abbrevmonth'] === 'May' ? 'May_short' : $start['abbrevmonth'];
		$end_month_abbrev = $end['abbrevmonth'] === 'May' ? 'May_short' : $end['abbrevmonth'];
		$start_month_name = $language->lang(['datetime', $start['monthname']]);
		$start_month_abbrev = $language->lang(['datetime', $start_month_abbrev]);
		$end_month_name = $this->language->lang(['datetime', $end['monthname']]);
		$end_month_abbrev = $this->language->lang(['datetime', $end_month_abbrev]);
		$start_day_name = $this->language->lang(['datetime', $start['dayname']]);
		$start_day_abbrev = $this->language->lang(['datetime', $start['abbrevdayname']]);
		$end_day_name = $this->language->lang(['datetime', $end['dayname']]);
		$end_day_abbrev = $this->language->lang(['datetime', $end['abbrevdayname']]);
		$start_year_short = substr($start['year'], -2);
		$end_year_short = substr($end['year'], -2);
		$start_month_padded = str_pad($start['month'], 2, '0');
		$end_month_padded = str_pad($end['month'], 2, '0');
		$start_day_padded = str_pad($start['day'], 2, '0');
		$end_day_padded = str_pad($end['day'], 2, '0');

		$replace = [
			'yy1'	=> $start['year'],
			'yy2'	=> $end['year'],
			'yy'	=> $start['year'],
			'y1'	=> $start_year_short,
			'y2'	=> $end_year_short,
			'y'		=> $start_year_short,
			'mm1'	=> $start_month_padded,
			'mm2'	=> $end_month_padded,
			'mm'	=> $start_month_padded,
			'm1'	=> $start['month'],
			'm2'	=> $end['month'],
			'm'		=> $start['month'],
			'dd1'	=> $start_day_padded,
			'dd2'	=> $end_day_padded,
			'dd'	=> $start_day_padded,
			'd1'	=> $start['day'],
			'd2'	=> $end['day'],
			'd'		=> $start['day'],
			'MM1'	=> $start_month_name,
			'MM2'	=> $end_month_name,
			'MM'	=> $start_month_name,
			'M1'	=> $start_month_abbrev,
			'M2'	=> $end_month_abbrev,
			'M'		=> $start_month_abbrev,
			'DD1'	=> $start_day_name,
			'DD2'	=> $end_day_name,
			'DD'	=> $start_day_name,
			'D1'	=> $start_day_abbrev,
			'D2'	=> $end_day_abbrev,
			'D'		=> $start_day_abbrev,
		];

		$tag = strtr($format, $replace);

		$replace = [
			'%tag%'		=> $tag,
			'%open%'	=> $open,
			'%close%'	=> $close,
			'%index%'	=> $index,
			'%total%'	=> $total,
		];

		return strtr($template, $replace);
	}
}
