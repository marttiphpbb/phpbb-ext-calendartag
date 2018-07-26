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

/* compose tag legend:
1. opening char(s)
2. open link calendar view
3. indicator multi events (next:, last: )
4. //
5. start year
6. start month
7. start day
8. end year
9. end month
10. end day
11. close link calendar view
12. closing char(s)
*/

	'MARTTIPHPBB_CALENDARTAG_DIFF_YEAR'		=> '%1$s%$2s%3$s%6$s %7$s,%5$s - %9$s %10$s, %8$s%11$s12$s',
	'MARTTIPHPBB_CALENDARTAG_DIFF_MONTH'	=> '%1$s%$2s%3$s%6$s %7$s - %9$s %10$s, %8$s%11$s12$s',
	'MARTTIPHPBB_CALENDARTAG_DIFF_DAY'		=> '%1$s%$2s%3$s%6$s %7$s - %10$s, %8$s%11$s12$s',
	'MARTTIPHPBB_CALENDARTAG_SAME_DAY'		=> '%1$s%$2s%3$s%6$s %7$s,%5$s%11$s12$s',

	'MARTTIPHPBB_CALENDARTAG_NEXT'			=> 'next: ',
	'MARTTIPHPBB_CALENDARTAG_LAST'			=> 'last: ',

]);
