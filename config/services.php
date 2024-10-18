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
use PhpDevCommunity\Session\Storage\NativeSessionStorage;
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
//    \App\Middleware\ForceHttpsMiddleware::class => static function (ContainerInterface $container) {
//        return new \App\Middleware\ForceHttpsMiddleware(response_factory());
//    },
//    \App\Middleware\IpRestrictionMiddleware::class => static function (ContainerInterface $container) {
//        return new \App\Middleware\IpRestrictionMiddleware(["192.168.33.12"],response_factory());
//    },
//    \App\Middleware\MaintenanceMiddleware::class => static function (ContainerInterface $container) {
//        return new \App\Middleware\MaintenanceMiddleware(true,response_factory());
//    },
    SessionStorageInterface::class => static function (ContainerInterface $container) {
        return new NativeSessionStorage();
    },
    Flash::class => static function (ContainerInterface $container) {
        $session = $container->get(SessionStorageInterface::class);
        return new PhpDevCommunity\Flash\Flash($session);
    },
    LoggerInterface::class => static function (ContainerInterface $container) {
        $logFileName = $container->get('michel.logs_dir') . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
        $handler = new FileHandler($logFileName);
        return new Logger($handler);
    },
//    'router' => static function (ContainerInterface $container): object {
//
//        /**
//         * @var array<\PhpDevCommunity\Michel\Core\Router\Route> $routes
//         */
//        $routes = $container->get('michel.routes');
//        $factory = new \PhpDevCommunity\Michel\Core\Router\Bridge\RouteFactory();
//
//        /**
//         * Aura Router Example : composer require aura/router
//         */
//            $router = new \Aura\Router\RouterContainer();
//            foreach ($routes as $route) {
//                $router->getMap()->addRoute($factory->createAuraRoute($route));
//            }
//            return $router;
//
//        /**
//         * Symfony Routing Example : composer require symfony/routing
//         */
//            $router = new \Symfony\Component\Routing\RouteCollection();
//            foreach ($routes as $route) {
//                $router->add($route->getName(), $factory->createSymfonyRoute($route));
//            }
//            return $router;
//    },
];
