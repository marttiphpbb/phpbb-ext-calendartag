<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\migrations;

use marttiphpbb\calendartag\util\cnst;

class mgr_2 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\marttiphpbb\calendartag\migrations\mgr_1',
		];
	}

	public function update_data()
	{
		return [
			['config_text.add', [cnst::ID, serialize(cnst::DEFAULT_SETTINGS)]],
		];
	}
}
