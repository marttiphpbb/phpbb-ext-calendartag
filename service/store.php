<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\service;

use phpbb\config\db_text as config_text;
use phpbb\cache\driver\driver_interface as cache;
use marttiphpbb\calendartag\util\cnst;

class store
{
	protected $config_text;
	protected $cache;
	protected $local_cache;
	protected $transaction = false;

	public function __construct(
		config_text $config_text,
		cache $cache
	)
	{
		$this->config_text = $config_text;
		$this->cache = $cache;
	}

	private function get_all():array
	{
		if (isset($this->local_cache) && is_array($this->local_cache))
		{
			return $this->local_cache;
		}

		$settings = $this->cache->get(cnst::CACHE_ID);

		if ($settings)
		{
			$this->local_cache = $settings;
			return $settings;
		}

		$this->local_cache = unserialize($this->config_text->get(cnst::ID));
		$this->cache->put(cnst::CACHE_ID, $this->local_cache);

		return $this->local_cache;
	}

	private function set(array $ary):void
	{
		if ($ary === $this->local_cache)
		{
			return;
		}
		$this->local_cache = $ary;

		if (!$this->transaction)
		{
			$this->write($ary);
		}
	}

	private function write(array $ary):void
	{
		$this->cache->put(cnst::CACHE_ID, $ary);
		$this->config_text->set(cnst::ID, serialize($ary));
	}

	public function transaction_start():void
	{
		$this->transaction = true;
	}

	public function transaction_end():void
	{
		$this->transaction = false;
		$this->write($this->local_cache);
	}

	private function set_boolean(string $name, bool $value):void
	{
		$ary = $this->get_all();
		$ary[$name] = $value;
		$this->set($ary);
	}

	private function get_boolean(string $name):bool
	{
		return $this->get_all()[$name];
	}

	public function set_is_prefix(bool $is_prefix):void
	{
		$this->set_boolean('is_prefix', $is_prefix);
	}

	public function get_is_prefix():bool
	{
		return $this->get_boolean('is_prefix');
	}

	public function set_format_diff_year(string $format):void
	{
		$ary = $this->get_all();
		$ary['format']['diff_year'] = $format;
		$this->set($ary);
	}

	public function get_format_diff_year():string
	{
		return $this->get_all()['format']['diff_year'];
	}

	public function set_format_diff_month(string $format):void
	{
		$ary = $this->get_all();
		$ary['format']['diff_month'] = $format;
		$this->set($ary);
	}

	public function get_format_diff_month():string
	{
		return $this->get_all()['format']['diff_month'];
	}

	public function set_format_diff_day(string $format):void
	{
		$ary = $this->get_all();
		$ary['format']['diff_day'] = $format;
		$this->set($ary);
	}

	public function get_format_diff_day():string
	{
		return $this->get_all()['format']['diff_day'];
	}

	public function set_format_same_day(string $format):void
	{
		$ary = $this->get_all();
		$ary['format']['same_day'] = $format;
		$this->set($ary);
	}

	public function get_format_same_day():string
	{
		return $this->get_all()['format']['same_day'];
	}

	public function set_template_single_before(string $format):void
	{
		$ary = $this->get_all();
		$ary['template']['single']['before'] = $format;
		$this->set($ary);
	}

	public function get_template_single_before():string
	{
		return $this->get_all()['template']['single']['before'];
	}

	public function set_template_single_now(string $format):void
	{
		$ary = $this->get_all();
		$ary['template']['single']['now'] = $format;
		$this->set($ary);
	}

	public function get_template_single_now():string
	{
		return $this->get_all()['template']['single']['now'];
	}

	public function set_template_single_after(string $format):void
	{
		$ary = $this->get_all();
		$ary['template']['single']['after'] = $format;
		$this->set($ary);
	}

	public function get_template_single_after():string
	{
		return $this->get_all()['template']['single']['after'];
	}

	public function set_template_multi_first(string $format):void
	{
		$ary = $this->get_all();
		$ary['template']['multi']['first'] = $format;
		$this->set($ary);
	}

	public function get_template_multi_first():string
	{
		return $this->get_all()['template']['multi']['first'];
	}

	public function set_template_multi_next(string $format):void
	{
		$ary = $this->get_all();
		$ary['template']['multi']['next'] = $format;
		$this->set($ary);
	}

	public function get_template_multi_next():string
	{
		return $this->get_all()['template']['multi']['next'];
	}

	public function set_template_multi_now(string $format):void
	{
		$ary = $this->get_all();
		$ary['template']['multi']['now'] = $format;
		$this->set($ary);
	}

	public function get_template_multi_now():string
	{
		return $this->get_all()['template']['multi']['now'];
	}

	public function set_template_multi_last(string $format):void
	{
		$ary = $this->get_all();
		$ary['template']['multi']['last'] = $format;
		$this->set($ary);
	}

	public function get_template_multi_last():string
	{
		return $this->get_all()['template']['multi']['last'];
	}
}
