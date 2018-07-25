<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\acp;

use marttiphpbb\calendarmono\util\cnst;

class main_info
{
	function module()
	{
		return [
			'filename'	=> '\marttiphpbb\calendarmono\acp\main_module',
			'title'		=> cnst::L_ACP ,
			'modes'		=> [
				'tag_rendering'	=> [
					'title'	=> cnst::L_ACP . '_TAG_RENDERING',
					'auth'	=> 'ext_marttiphpbb/calendarmono && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
			],
		];
	}
}
