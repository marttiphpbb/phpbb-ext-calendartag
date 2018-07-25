<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\migrations;

use marttiphpbb\calendarmono\util\cnst;

class mgr_3 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\marttiphpbb\calendarmono\migrations\mgr_2',
		];
	}

	public function update_data()
	{
		return [
			['config.add', [cnst::TAG_IS_PREFIX, 0]],
		];
	}
}
