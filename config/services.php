<?php

declare(strict_types=1);

/**
 * Pulsar PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    Pulsar
 * @author    Devcoder.xyz
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.devcoder.xyz
 */

use DevCoder\Flash\Flash;
use DevCoder\Log\Handler\FileHandler;
use DevCoder\Log\Logger;
use DevCoder\Session\Storage\NativeSessionStorage;
use DevCoder\Session\Storage\SessionStorageInterface;
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
    SessionStorageInterface::class => static function (ContainerInterface $container) {
        return new NativeSessionStorage();
    },
    Flash::class => static function (ContainerInterface $container) {
        $session = $container->get(SessionStorageInterface::class);
        return new DevCoder\Flash\Flash($session);
    },
    LoggerInterface::class => static function (ContainerInterface $container) {
        $logFileName = $container->get('essential.logs_dir') . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
        $handler = new FileHandler($logFileName);
        return new Logger($handler);
    }
//    'router' => static function (ContainerInterface $container): object {
//
//        /**
//         * @var array<\Essential\Core\Router\Route> $routes
//         */
//        $routes = $container->get('essential.routes');
//        $factory = new \Essential\Core\Router\Bridge\RouteFactory();
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