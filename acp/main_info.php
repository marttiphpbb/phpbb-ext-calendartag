<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\acp;

use marttiphpbb\calendartag\util\cnst;

class main_info
{
	function module():array
	{
		return [
			'filename'	=> '\marttiphpbb\calendartag\acp\main_module',
			'title'		=> cnst::L_ACP ,
			'modes'		=> [
				'placement'	=> [
					'title'	=> cnst::L_ACP . '_PLACEMENT',
					'auth'	=> 'ext_marttiphpbb/calendartag && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
				'format'	=> [
					'title'	=> cnst::L_ACP . '_FORMAT',
					'auth'	=> 'ext_marttiphpbb/calendartag && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
				'template'	=> [
					'title'	=> cnst::L_ACP . '_TEMPLATE',
					'auth'	=> 'ext_marttiphpbb/calendartag && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
			],
		];
	}
}
