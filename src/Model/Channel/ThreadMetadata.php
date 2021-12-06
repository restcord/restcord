<?php

/*
 * Copyright 2017 Aaron Scherer
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE
 *
 * @package     restcord/restcord
 * @copyright   Aaron Scherer 2017
 * @license     MIT
 */

namespace RestCord\Model\Channel;

/**
 * ThreadMetadata Model
 */
class ThreadMetadata {

	/**
	 * timestamp when the thread's archive status was last changed, used for calculating recent activity
	 *
	 * @var \DateTimeImmutable
	 */
	public $archive_timestamp;

	/**
	 * whether the thread is archived
	 *
	 * @var bool
	 */
	public $archived = false;

	/**
	 * duration in minutes to automatically archive the thread after recent activity, can be set to: 60, 1440, 4320, 10080
	 *
	 * @var int
	 */
	public $auto_archive_duration;

	/**
	 * whether non-moderators can add other non-moderators to a thread; only available on private threads
	 *
	 * @var bool
	 */
	public $invitable = false;

	/**
	 * whether the thread is locked; when a thread is locked, only users with MANAGE_THREADS can unarchive it
	 *
	 * @var bool
	 */
	public $locked = false;

	/**
	 * @param array $content
	 */
	public function __construct(array $content = null) {
		if (null === $content) {
		    return;
		}
		                    
		foreach ($content as $key => $value) {
		    $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
		    if (property_exists($this, $key)) {
		        $this->{$key} = $value;
		    }
		}
	}
}