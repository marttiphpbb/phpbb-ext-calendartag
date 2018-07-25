<?php

/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\core;

use marttiphpbb\calendartag\core\timespan;
use marttiphpbb\calendartag\core\calendartag_event;

class calendartag_event_row
{
	protected $timespan;
	protected $free_timespans = [];
	protected $calendartag_events = [];

	public function __construct(
		timespan $timespan
	)
	{
		$this->timespan = $timespan;
		$this->free_timespans = [$timespan];
	}

	public function insert_calendartag_event(calendartag_event $calendartag_event)
	{
		$timespan = $calendartag_event->get_timespan();

		foreach ($this->calendartag_events as $ev)
		{
			if ($ev->overlaps($timespan))
			{
				return false;
			}
		}

		$this->calendartag_events[] = $calendartag_event;

		return true;
	}
}
