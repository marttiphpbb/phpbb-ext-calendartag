<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 marttiphpbb <info@martti.be>
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

	public function update_schema()
	{
		return [
			'add_columns'        => [
				$this->table_prefix . 'topics'        => [
					cnst::COLUMN_START  => ['UINT', NULL],
					cnst::COLUMN_END 	=> ['UINT', NULL],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns'        => [
				$this->table_prefix . 'topics' => [
					cnst::COLUMN_START,
					cnst::COLUMN_END,
				],
			],
		];
	}
}
