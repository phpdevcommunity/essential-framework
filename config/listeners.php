<?php

declare(strict_types=1);

/**
 * Essential PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package	Essential
 * @author	Devcoder.xyz
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://www.devcoder.xyz
 */

#--------------------------------------------------------------------
# List of Listeners
#--------------------------------------------------------------------
return [
    \App\Event\ExampleEvent::class => \App\Listeners\ExampleListener::class
//    \App\Event\ExampleEvent::class => [
//        \App\Listeners\ExampleListener::class,
//        \App\Listeners\ExampleListener2::class,
//        \App\Listeners\ExampleListener3::class,
//    ]
];