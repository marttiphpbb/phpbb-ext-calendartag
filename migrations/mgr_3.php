<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\migrations;

use marttiphpbb\calendartag\util\cnst;

class mgr_3 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\marttiphpbb\calendartag\migrations\mgr_2',
		];
	}

	public function update_data()
	{
		return [
			['config.add', [cnst::TAG_IS_PREFIX, 0]],
		];
	}
}
