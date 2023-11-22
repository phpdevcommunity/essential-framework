<?php

namespace App\Listeners;

use App\Event\ExampleEvent;

/**
 * @see https://github.com/devcoder-xyz/php-event-dispatcher
 */
final class ExampleListener
{
    /**
     * @param ExampleEvent $event
     */
    public function __invoke(ExampleEvent $event): void
    {
        $object = $event->getObject();
        // do something
    }
}
