<?php

declare(strict_types=1);

/**
 * Michel PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package	PhpDevCommunity Michel
 * @author	PhpDevCommunity
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://www.phpdevcommunity.com
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
