<?php

/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [

	'ACP_MARTTIPHPBB_CALENDARTAG_SETTINGS_SAVED'
		=> 'Settings have been saved successfully!',

	'ACP_MARTTIPHPBB_CALENDARTAG_PLACEMENT_LABEL'
		=> 'Placement in relation to the topic title',
	'ACP_MARTTIPHPBB_CALENDARTAG_PLACEMENT_LABEL_EXPLAIN'
		=> 'Notice that the respective rendering
		extension needs to be installed, either %1$sTopic Prefix Tags%2$s or
		%3$sTopic Suffix Tags%2$s',
	'ACP_MARTTIPHPBB_CALENDARTAG_PLACEMENT_BEFORE'
		=> 'Before',
	'ACP_MARTTIPHPBB_CALENDARTAG_PLACEMENT_AFTER'
		=> 'After',

	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_CODES'
		=> 'The format can be combinations of the following: <ul>
			<li><code>d</code> - day of month (no leading zero)</li>
			<li><code>dd</code> - day of month (two digit)</li>
			<li><code>D</code> - day name short</li>
			<li><code>DD</code> - day name long</li>
			<li><code>m</code> - month of year (no leading zero)</li>
			<li><code>mm</code> - month of year (two digit)</li>
			<li><code>M</code> - month name short</li>
			<li><code>MM</code> - month name long</li>
			<li><code>y</code> - year (two digit)</li>
			<li><code>yy</code> - year (four digit)</li></ul>
			Any of the above can be followed by the numbers 1 or 2,
			indicating the start date or the end date. When not followed
			by a number, the code is from the start date.
			Anything else is literal text.',

	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_EXPLAIN'
		=> 'The calendar tag is formatted in 4 different ways depending
		on the relation between the start and end date.',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_DIFF_YEAR'
		=> 'Different year',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_DIFF_YEAR_EXPLAIN'
		=> 'The start and end date of the calendar event are
		in a different year.',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_DIFF_MONTH'
		=> 'Different month',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_DIFF_MONTH_EXPLAIN'
		=> 'The start and end date of the calendar event are
		in a different month, but in the same year.',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_DIFF_DAY'
		=> 'Different day',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_DIFF_DAY_EXPLAIN'
		=> 'The start and end date of the calendar event are
		not on the same day, but in the same month.',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_SAME_DAY'
		=> 'Same day',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_SAME_DAY_EXPLAIN'
		=> 'The start and end date of the calendar event are
		on the same day. It is a one day event.',

	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_EXPLAIN'
		=> 'The template for rendering the calendar tag',

	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_SINGLE'
		=> 'Single Event',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_SINGLE_EXPLAIN'
		=> 'When a topic has a single calendar event
		one of these templates will be selected to render the
		tag in relation to this moment.',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_SINGLE_BEFORE'
		=> 'Before the event',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_SINGLE_NOW'
		=> 'During the event',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_SINGLE_AFTER'
		=> 'After the event',

	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_MULTI'
		=> 'Multiple Events',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_MULTI_EXPLAIN'
		=> 'When a topic has multiple calendar events
		one of these templates will be selected to render the
		tag in relation to this moment.',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_MULTI_FIRST'
		=> 'Before the first event',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_MULTI_NOW'
		=> 'During one of the events',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_MULTI_NEXT'
		=> 'Before the next event',
	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_MULTI_LAST'
		=> 'After the last event',

	'ACP_MARTTIPHPBB_CALENDARTAG_TEMPLATE_CODES'
		=> 'The template can be combinations of the following: <ul>
			<li><code>%tag%</code> - the tag indicating the period of the calendar event</li>
			<li><code>%open%</code> - open the link to the calendar view (separate extension)</li>
			<li><code>%close%</code> - close the link to the calendar view</li>
			<li><code>%index%</code> - the current number in a row of events (from the same topic)</li>
			<li><code>%total%</code> - the total number of events of a topic</li>
			</ul>
			Anything else is literal text.',
]);
