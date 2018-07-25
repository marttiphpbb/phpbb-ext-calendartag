<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\event;

use phpbb\template\template;
use phpbb\language\language;
use phpbb\config\config;
use phpbb\event\data as event;
use marttiphpbb\calendarmono\render\links;
use marttiphpbb\calendarmono\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $template;
	protected $language;
	protected $config;

	public function __construct(
		template $template,
		language $language,
		config $config
	)
	{
		$this->template = $template;
		$this->language = $language;
		$this->config = $config;
	}

	static public function getSubscribedEvents()
	{
		return [
			'core.user_setup'						=> 'core_user_setup',
			'marttiphpbb.topicsuffixtags.set_tags'	=> 'set_suffix_tags',
			'marttiphpbb.topicprefixtags.set_tags'	=> 'set_prefix_tags',
		];
	}

	public function set_prefix_tags(event $event)
	{
		if (!$this->config[cnst::TAG_IS_PREFIX])
		{
			return;
		}

		$tags = $event['tags'];
		$tags[] = '[ oufti: ' . $event['topic_id'] . ' ' . $event['origin_event_name'] . ' ]';
		$event['tags'] = $tags;
	}

	public function set_suffix_tags(event $event)
	{
		if ($this->config[cnst::TAG_IS_PREFIX])
		{
			return;
		}

		$tags = $event['tags'];

		$event['tags'] = $tags;
	}

	public function core_user_setup(event $event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		/*
		$lang_set_ext[] = [
			'ext_name' => 'marttiphpbb/calendarmono',
			'lang_set' => 'common',
		];
		*/
		$event['lang_set_ext'] = $lang_set_ext;
	}
}
