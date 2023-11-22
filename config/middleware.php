<?php
/**
 * Essential PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    Essential
 * @author    Devcoder.xyz
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.devcoder.xyz
 */


#--------------------------------------------------------------------
# List of Middleware
#--------------------------------------------------------------------
return [
    \Middlewares\BasePath::class => ['dev', 'prod'],
    \Essential\Core\Middlewares\RouterMiddleware::class => ['dev', 'prod'],
    \Essential\Core\Middlewares\ControllerMiddleware::class => ['dev', 'prod'],
];