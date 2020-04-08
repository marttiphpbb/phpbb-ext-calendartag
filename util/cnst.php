<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\util;

class cnst
{
	const FOLDER = 'marttiphpbb/calendartag';
	const ID = 'marttiphpbb_calendartag';
	const CACHE_ID = '_' . self::ID;
	const PREFIX = self::ID . '_';
	const L = 'MARTTIPHPBB_CALENDARTAG';
	const L_ACP = 'ACP_' . self::L;
	const L_MCP = 'MCP_' . self::L;
	const TPL = '@' . self::ID . '/';
	const EXT_PATH = 'ext/' . self::FOLDER . '/';
	const DEFAULT_SETTINGS = [
		'is_prefix' => false,
		'format'	=> [
			'diff_year'		=> 'MM1 d1, yy1 - MM2 d2, yy2',
			'diff_month'	=> 'MM1 d1 - MM2 d2, yy',
			'diff_day'		=> 'MM d1 - d2, yy',
			'same_day'		=> 'MM d, yy',
		],
		'template'	=> [
			'single'	=> [
				'before'	=> '[%open%%tag%%close%]',
				'now'		=> '[%open%%tag%%close%]',
				'after'		=> '[%open%%tag%%close%]',
			],
			'multi'	=> [
				'first'	=> '[first: %open%%tag%%close%]',
				'next'	=> '[next: %open%%tag%%close%]',
				'now'	=> '[%open%%tag%%close%]',
				'last'	=> '[last: %open%%tag%%close%]',
			],
		],
	];
}
