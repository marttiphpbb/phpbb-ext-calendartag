<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\acp;

use marttiphpbb\calendartag\util\cnst;

class main_info
{
	function module()
	{
		return [
			'filename'	=> '\marttiphpbb\calendartag\acp\main_module',
			'title'		=> cnst::L_ACP ,
			'modes'		=> [
				'tag_rendering'	=> [
					'title'	=> cnst::L_ACP . '_TAG_RENDERING',
					'auth'	=> 'ext_marttiphpbb/calendartag && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
			],
		];
	}
}
