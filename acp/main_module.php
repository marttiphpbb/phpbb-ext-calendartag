<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\acp;

use marttiphpbb\calendartag\util\cnst;

class main_module
{
	var $u_action;
	protected $request;

	function main($id, $mode)
	{
		global $phpbb_container;

		$language = $phpbb_container->get('language');
		$template = $phpbb_container->get('template');
		$store = $phpbb_container->get('marttiphpbb.calendartag.store');
		$request = $phpbb_container->get('request');
		$this->request = $request;
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

					$store->set_is_prefix($request->variable('is_prefix', 0) ? true : false);

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'IS_PREFIX'		=> $store->get_is_prefix(),
				]);

			break;

			case 'format':

				$this->tpl_name = 'format';
				$this->page_title = $language->lang(cnst::L_ACP . '_FORMAT');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$store->transaction_start();
					$store->set_format_diff_year($request->variable('diff_year', ''));
					$store->set_format_diff_month($request->variable('diff_month', ''));
					$store->set_format_diff_day($request->variable('diff_day', ''));
					$store->set_format_same_day($request->variable('same_day', ''));
					$store->transaction_end();

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'DIFF_YEAR'		=> $store->get_format_diff_year(),
					'DIFF_MONTH'	=> $store->get_format_diff_month(),
					'DIFF_DAY'		=> $store->get_format_diff_day(),
					'SAME_DAY'		=> $store->get_format_same_day(),
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

					$store->transaction_start();
					$store->set_template_single_before($this->request_raw_str('single_before'));
					$store->set_template_single_now($this->request_raw_str('single_now'));
					$store->set_template_single_after($this->request_raw_str('single_after'));
					$store->set_template_multi_first($this->request_raw_str('multi_first'));
					$store->set_template_multi_now($this->request_raw_str('multi_now'));
					$store->set_template_multi_next($this->request_raw_str('multi_next'));
					$store->set_template_multi_last($this->request_raw_str('multi_last'));
					$store->transaction_end();

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'SINGLE_BEFORE'		=> $store->get_template_single_before(),
					'SINGLE_NOW'		=> $store->get_template_single_now(),
					'SINGLE_AFTER'		=> $store->get_template_single_after(),
					'MULTI_FIRST'		=> $store->get_template_multi_first(),
					'MULTI_NOW'			=> $store->get_template_multi_now(),
					'MULTI_NEXT'		=> $store->get_template_multi_next(),
					'MULTI_LAST'		=> $store->get_template_multi_last(),
				]);

			break;
		}

		$template->assign_var('U_ACTION', $this->u_action);
	}

	private function request_raw_str(string $name):string
	{
		$value = utf8_normalize_nfc($this->request->variable($name, '', true));
		return htmlspecialchars_decode($value);
	}
}
