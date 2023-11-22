<?php

namespace App\Event;

use DevCoder\Listener\Event;

/**
 * @see https://github.com/devcoder-xyz/php-event-dispatcher
 */
final class ExampleEvent extends Event
{
    /**
     * @var object
     */
    private object $object;

    /**
     * PreCreateEvent constructor.
     * @param object $object
     */
    public function __construct(object $object)
    {
        $this->object = $object;
    }

    /**
     * @return object
     */
    public function getObject(): object
    {
        return $this->object;
    }
}