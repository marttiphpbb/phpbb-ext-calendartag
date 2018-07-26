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

	'ACP_MARTTIPHPBB_CALENDARTAG_SETTINGS_SAVED'	=> 'Settings have been saved successfully!',

	'ACP_MARTTIPHPBB_CALENDARTAG_IS_PREFIX'
		=> 'Tag is prefix',
	'ACP_MARTTIPHPBB_CALENDARTAG_IS_PREFIX_EXPLAIN'
		=> 'The date tag will be rendered as prefix or suffix to the topic
		title according to this setting. Notice that the respective rendering
		extension needs to be installed, either %1$sTopic Prefix Tags%2$s or
		%3$sTopic Suffix Tags%2$s',

	'ACP_MARTTIPHPBB_CALENDARTAG_FORMAT_CODES'
	=> 'The format can be combinations of the following: <ul>
		<li>d - day of month (no leading zero)</li>
		<li>dd - day of month (two digit)</li>
		<li>D - day name short</li>
		<li>DD - day name long</li>
		<li>m - month of year (no leading zero)</li>
		<li>mm - month of year (two digit)</li>
		<li>M - month name short</li>
		<li>MM - month name long</li>
		<li>y - year (two digit)</li>
		<li>yy - year (four digit)</li></ul>
		Any of the above can be followed by the numbers 1 or 2,
		indicating the start date or the end date. When not followed
		by a number, the code is from the start date.
		Anything else is litaral text.',

]);
