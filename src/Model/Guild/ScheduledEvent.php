<?php


namespace RestCord\Model\Guild;


class ScheduledEvent
{
    /**
     * the id of the scheduled event
     *
     * @var int
     */
    public $id;

    /**
     * 	the guild id which the scheduled event belongs to
     *
     * @var bool
     */
    public $guild_id;

    /**
     * the channel id in which the scheduled event will be hosted, or null if scheduled entity type is EXTERNAL
     *
     * @var int
     */
    public $channel_id;

    /**
     * the id of the user that created the scheduled event *
     * creator_id will be null and creator will not be included for events created before October 25th, 2021, when the concept of creator_id was introduced and tracked.
     *
     * @var int
     */
    public $creator_id;

    /**
     * the name of the scheduled event (1-100 characters)
     *
     * @var string
     */
    public $name;

    /**
     * the description of the scheduled event (1-1000 characters)
     *
     * @var string
     */
    public $description;

    /**
     * the time the scheduled event will start
     *
     * @var \DateTimeImmutable|null
     */
    public $scheduled_start_time;

    /**
     * the time the scheduled event will end, required if entity_type is EXTERNAL
     *
     * @var \DateTimeImmutable|null
     */
    public $scheduled_end_time;

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