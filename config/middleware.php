<?php
/**
 * Michel PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    PhpDevCommunity Michel
 * @author    PhpDevCommunity
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.phpdevcommunity.com
 */


#--------------------------------------------------------------------
# List of Middleware
#--------------------------------------------------------------------
return [
    \Middlewares\BasePath::class => ['dev', 'prod'],
//    \App\Middleware\MaintenanceMiddleware::class =>  ['dev', 'prod'],
//    \App\Middleware\ForceHttpsMiddleware::class => ['prod'],
    \PhpDevCommunity\Michel\Core\Middlewares\RouterMiddleware::class => ['dev', 'prod'],
    \PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware::class => ['dev', 'prod'],
];
