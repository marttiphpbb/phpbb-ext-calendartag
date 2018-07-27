<?php
/**
* phpBB Extension - marttiphpbb calendartag
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendartag\event;

use phpbb\event\data as event;
use marttiphpbb\calendartag\service\render;
use marttiphpbb\calendartag\service\store;
use marttiphpbb\calendartag\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $render;
	protected $store;

	public function __construct(
		render $render,
		store $store
	)
	{
		$this->render = $render;
		$this->store = $store;
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
		if (!$this->store->get_is_prefix())
		{
			return;
		}

		$tags = $event['tags'];
		$topic_data = $event['topic_data'];

		$tags[] = $this->render->get($topic_data);

		$event['tags'] = $tags;
	}

	public function set_suffix_tags(event $event)
	{
		if (!$this->store->get_is_prefix())
		{
			return;
		}

		$tags = $event['tags'];
		$topic_data = $event['topic_data'];

		$tags[] = $this->render->get($topic_data);

		$event['tags'] = $tags;
	}
}
