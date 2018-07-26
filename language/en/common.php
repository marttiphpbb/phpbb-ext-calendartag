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

	'MARTTIPHPBB_CALENDARTAG_NOW'			=> 'now',
	'MARTTIPHPBB_CALENDARTAG_NEXT'			=> 'next',
	'MARTTIPHPBB_CALENDARTAG_FIRST'			=> 'first',
	'MARTTIPHPBB_CALENDARTAG_LAST'			=> 'last',
	'MARTTIPHPBB_CALENDARTAG_FINISHED'		=> 'finished',
]);
