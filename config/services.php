<?php

declare(strict_types=1);

/**
 * Michel PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    Michel
 * @author    PhpDevCommunity
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.phpdevcommunity.com
 */

use PhpDevCommunity\Flash\Flash;
use PhpDevCommunity\Log\Handler\FileHandler;
use PhpDevCommunity\Log\Logger;
use PhpDevCommunity\Session\Storage\SessionStorageInterface;
use Middlewares\BasePath;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

#--------------------------------------------------------------------
# List of Services
#--------------------------------------------------------------------
return [
    BasePath::class => static function (ContainerInterface $container) {
        return new BasePath($container->get('app.url'));
    },
    Flash::class => static function (ContainerInterface $container) {
        $session = $container->get(SessionStorageInterface::class);
        return new Flash($session);
    },
    LoggerInterface::class => static function (ContainerInterface $container) {
        $logFileName = $container->get('michel.logs_dir') . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
        $handler = new FileHandler($logFileName);
        return new Logger($handler);
    },
];
