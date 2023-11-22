<?php

declare(strict_types=1);

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

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Configuration for Essential Framework settings.
 *
 * This array defines various settings used by the Essential Framework.
 * It includes settings for the server request, response factory, dependency injection container,
 * custom environments, and more. You can customize these settings as needed.
 *
 * @return array
 */
return [

    // Framework Settings

    /**
     * Creates a ServerRequestInterface instance.
     *
     * You can modify this closure to customize how the server request is created.
     *
     * @return Closure - ServerRequestInterface
     */
    'server_request' => static function (): ServerRequestInterface {
        return \Laminas\Diactoros\ServerRequestFactory::fromGlobals();
    },

    /**
     * Creates a ResponseFactoryInterface instance.
     *
     * You can modify this closure to customize how the response factory is created.
     *
     * @return Closure - ResponseFactoryInterface
     */
    'response_factory' => static function (): ResponseFactoryInterface {
        return new \Laminas\Diactoros\ResponseFactory();
    },

    /**
     * Creates a dependency injection container.
     *
     * You can modify this closure to change the dependency injection container implementation.
     *
     * @param array $definitions Custom definitions for the container.
     * @param array $options Additional options for container creation.
     *
     * @return ContainerInterface The dependency injection container.
     */
    'container' => static function (array $definitions, array $options): ContainerInterface {

        /**
         * To use PHP-DI for dependency injection:
         *
         * Uncomment the following code and add your custom container configuration.
         * Then, return the built container instance.
         *
         * Example:
         * $builder = new DI\ContainerBuilder();
         * $builder->addDefinitions($definitions);
         * return $builder->build();
         */

         return new \DevCoder\DependencyInjection\Container(
             $definitions,
             new \DevCoder\DependencyInjection\ReflectionResolver()
         );
    },

    /**
     * Custom environment settings.
     *
     * You can define custom environments in this array if needed.
     *
     * @return array<string> List of custom environment names.
     */
    'custom_environments' => [],
];