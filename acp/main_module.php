<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\acp;

use marttiphpbb\calendarmono\util\cnst;

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

//		$settings = $phpbb_container->get('marttiphpbb.calendarmono.repository.settings');

		switch($mode)
		{
			case 'tag_rendering':

				$this->tpl_name = 'tag_rendering';
				$this->page_title = $language->lang(cnst::L_ACP . '_TAG_RENDERING');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$config->set(cnst::TAG_IS_PREFIX, $request->variable('tag_is_prefix', 0));

/*
					$settings->set_lower_limit_days($request->variable('lower_limit_days', 0));
					$settings->set_upper_limit_days($request->variable('upper_limit_days', 0));
					$settings->set_min_duration_days($request->variable('min_duration_days', 0));
					$settings->set_max_duration_days($request->variable('max_duration_days', 0));
*/
					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'TAG_IS_PREFIX'		=> $config[cnst::TAG_IS_PREFIX],
				]);

			break;
		}

		$template->assign_var('U_ACTION', $this->u_action);
	}
}
