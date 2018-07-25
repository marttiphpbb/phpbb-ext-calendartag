<?php

/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\core;

use marttiphpbb\calendarmono\core\timespan;
use marttiphpbb\calendarmono\core\calendarmono_event;

class calendarmono_event_row
{
	protected $timespan;
	protected $free_timespans = [];
	protected $calendarmono_events = [];

	public function __construct(
		timespan $timespan
	)
	{
		$this->timespan = $timespan;
		$this->free_timespans = [$timespan];
	}

	public function insert_calendarmono_event(calendarmono_event $calendarmono_event)
	{
		$timespan = $calendarmono_event->get_timespan();

		foreach ($this->calendarmono_events as $ev)
		{
			if ($ev->overlaps($timespan))
			{
				return false;
			}
		}

		$this->calendarmono_events[] = $calendarmono_event;

		return true;
	}
}
