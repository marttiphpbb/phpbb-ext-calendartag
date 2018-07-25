<?php

/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
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

	'ACP_MARTTIPHPBB_CALENDARMONO_SETTINGS_SAVED'	=> 'Settings have been saved successfully!',
	'ACP_MARTTIPHPBB_CALENDARMONO_TAG_IS_PREFIX'
		=> 'Tag is prefix',
	'ACP_MARTTIPHPBB_CALENDARMONO_TAG_IS_PREFIX_EXPLAIN'
		=> 'The date tag will be rendered as prefix or suffix to the topic
		title according to this setting. Notice that the respective rendering
		extension needs to be installed, either %1$sTopic Prefix Tags%2$s or
		%3$sTopic Suffix Tags%2$s',

]);
