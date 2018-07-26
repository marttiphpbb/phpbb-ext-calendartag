<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\acp;

use marttiphpbb\calendartag\util\cnst;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $phpbb_container;

		$language = $phpbb_container->get('language');
		$template = $phpbb_container->get('template');
		$config = $phpbb_container->get('config');
		$request = $phpbb_container->get('request');
		$phpbb_root_path = $phpbb_container->getParameter('core.root_path');

		$language->add_lang('acp', cnst::FOLDER);
		add_form_key(cnst::FOLDER);

		switch($mode)
		{
			case 'placement':

				$this->tpl_name = 'placement';
				$this->page_title = $language->lang(cnst::L_ACP . '_PLACEMENT');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$config->set(cnst::CONFIG_IS_PREFIX, $request->variable('is_prefix', 0));

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'IS_PREFIX'		=> $config[cnst::CONFIG_IS_PREFIX],
				]);

			break;

			case 'template':

				$this->tpl_name = 'template';
				$this->page_title = $language->lang(cnst::L_ACP . '_TEMPLATE');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$config->set(cnst::CONFIG_IS_PREFIX, $request->variable('is_prefix', 0));

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'TAG_IS_PREFIX'		=> $config[cnst::CONFIG_IS_PREFIX],
				]);

			break;
		}

		$template->assign_var('U_ACTION', $this->u_action);
	}
}
