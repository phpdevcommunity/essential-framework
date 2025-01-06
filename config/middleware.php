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
use Middlewares\BasePath;
use PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware;
use PhpDevCommunity\Michel\Core\Middlewares\ForceHttpsMiddleware;
use PhpDevCommunity\Michel\Core\Middlewares\IpRestrictionMiddleware;
use PhpDevCommunity\Michel\Core\Middlewares\MaintenanceMiddleware;
use PhpDevCommunity\RouterMiddleware;

return [
    BasePath::class => ['dev', 'prod'],
    ForceHttpsMiddleware::class => ['prod'],
    MaintenanceMiddleware::class =>  ['dev', 'prod'],
    IpRestrictionMiddleware::class => ['prod'],
    RouterMiddleware::class => ['dev', 'prod'],
    ControllerMiddleware::class => ['dev', 'prod'],
];
