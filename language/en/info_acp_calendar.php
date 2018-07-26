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

	'ACP_MARTTIPHPBB_CALENDARTAG'			=> 'Calendar Tag',
	'ACP_MARTTIPHPBB_CALENDARTAG_PLACEMENT'	=> 'Placement',
	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT'	=> 'Format',
	'ACP_MARTTIPHPBB_CALENDARTAG_RENDERING'	=> 'Template',
]);
