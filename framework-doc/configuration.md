# Configuration in the Michel Framework

The Michel Framework provides flexible configuration options to suit your application's needs. These configurations can be managed through three primary methods: the `.env` file, the `parameters.php` file located in the `/config` directory, and the `framework.php` file, also located in the `/config` directory. This guide will help you understand how to use and manage these configurations effectively.

### 1. The `.env` File

The `.env` file, located in the root directory of your project, is used to define environment-specific configuration values. It's a plain text file that contains key-value pairs in the format `KEY=VALUE`. You can use this file to store environment-specific variables, such as database connection details, API keys, or any other settings that might change based on the environment (e.g., development, testing, production).

Here's an example of a typical `.env` file:

```dotenv
#--------------------------------------------------------------------
# FRAMEWORK
#--------------------------------------------------------------------

APP_ENV=prod
APP_TIMEZONE=UTC
APP_LOCALE=en
#APP_TEMPLATE_DIR=/app/templates

APP_URL=http://localhost
#APP_LOG_DIR=/app/var/log
#APP_CACHE_DIR=/app/var/cache
#APP_CONFIG_DIR=/app/config
#APP_PUBLIC_DIR=/app/public

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

#DATABASE_HOST=localhost
#DATABASE_DB=essential
#DATABASE_USER=root
#DATABASE_PASSWORD=root

#--------------------------------------------------------------------
# DOCKER
#--------------------------------------------------------------------

DOCKER_PORT_PHP=9008
DOCKER_PORT_NGINX=8081
```

### 2. The `parameters.php` File

The `parameters.php` file, located in the `/config` directory of your project, allows you to define application-specific configuration values. This file returns an associative array of configuration settings that can be accessed programmatically.

Here's an example of a `parameters.php` file:

```php
// config/parameters.php

#--------------------------------------------------------------------
# Parameters
#--------------------------------------------------------------------
return [
    'app.template_dir' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates',

//    'database.host' => getenv('DATABASE_HOST'),
//    'database.db' => getenv('DATABASE_DB'),
//    'database.user' => getenv('DATABASE_USER'),
//    'database.password' => getenv('DATABASE_PASSWORD'),
];
```

### 3. The `framework.php` File

The parameters.php file in the /config directory allows you to define custom parameters and settings for your application.

Here's a brief example of a `framework.php` file:

```php
// config/framework.php

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;

return [

    // Framework Settings

    /**
     * @return Closure - ServerRequestInterface
     * You can change it
     */
    'server_request' => static function (): ServerRequestInterface {
        return \Laminas\Diactoros\ServerRequestFactory::fromGlobals();
    },

    /**
     * @return Closure - ResponseFactoryInterface
     * You can change it
     */
    'response_factory' => static function (): ResponseFactoryInterface {
        return new \Laminas\Diactoros\ResponseFactory();
    },


    /**
     * @return ContainerInterface
     * You can change it
     */
    'container' => static function (array $definitions, array $options): ContainerInterface {

//        $cacheDir = $options['cache_dir'];

        /**
         * PHP-DI Example : composer require php-di/php-di
         */

//        $builder = new DI\ContainerBuilder();
//        $builder->addDefinitions($definitions);
//        return $builder->build();

        return new \PhpDevCommunity\DependencyInjection\Container(
            $definitions,
            new \PhpDevCommunity\DependencyInjection\ReflectionResolver()
        );
    },

    /**
     * @return array<string>
     * You can change it
     */
    'custom_environments' => [],
];
```

Sure, let's break it down step by step:

## Configuration Files: The .env File

The Michel Framework leverages the [php-dotenv](https://github.com/phpdevcommunity/php-dotenv) library to manage environment variables via a `.env` file. This file plays a crucial role in configuring your application based on different environments. Below, we'll discuss the default environment variables for both the Core Framework and the entire framework.

#### Default Environment Variables in the Core Framework

1. **`APP_ENV`**: This variable specifies the application environment, allowing you to set it to "dev" or "prod" based on your application's stage.

2. **`APP_URL`**: It defines the base URL of your application, providing a central point for generating URLs.

3. **`APP_LOCALE`**: This variable configures the default locale for your application, influencing localization settings.

4. **`APP_TIMEZONE`**: Sets the default timezone for your application, ensuring accurate date and time handling.

5. **`APP_TEMPLATE_DIR`**: Specifies the directory where your template files are located, facilitating template rendering.

#### Additional Default Environment Variables in the Entire Framework

1. **`APP_LOG_DIR`**: Defines the directory where log files generated by the framework will be stored.

2. **`APP_CACHE_DIR`**: Specifies the directory where cache files will be stored. Caching is crucial for optimizing application performance.

3. **`APP_CONFIG_DIR`**: This variable points to the directory where configuration files for the framework are located.

4. **`APP_PUBLIC_DIR`**: It defines the directory for public assets like CSS, JavaScript, and images.

These default environment variables provide a foundation for configuring your Michel Framework application. You can customize these variables in the `.env` file to suit your specific project requirements and environment settings.

## Configuration Files: The parameters.php File

In the Michel Framework, the `parameters.php` file plays a crucial role in managing application parameters. This file allows you to customize various settings, providing flexibility and adaptability to meet your project's requirements.

#### Overridable Core Parameters

You can override certain core parameters in the `parameters.php` file. Here are the core parameters that can be customized:

1. **`app.url`**: This parameter defines the base URL of your application. You can set it to your desired URL, allowing you to adapt your application to different environments or domains.

2. **`app.locale`**: Specifies the default locale for your application. Localization settings, such as language and date formats, can be tailored to your target audience.

3. **`app.template_dir`**: Indicates the directory where your template files are located. Customizing this parameter enables you to manage your template resources effectively.

#### Non-Overridable Core Parameters

Certain core parameters in the Michel Framework are non-overridable from the `parameters.php` file. These parameters are set based on the framework's internal configuration and are essential for its operation. Attempting to override these parameters may lead to unexpected behavior. Here are the non-overridable core parameters:

1. **`michel.environment`**: This parameter reflects the application's environment, such as "dev" or "prod," and is determined by the framework's environment settings.

2. **`michel.debug`**: It indicates whether the application is running in debug mode, typically enabled during development ("dev") and disabled in production ("prod").

3. **`michel.project_dir`**: Specifies the project directory path, which is essential for locating various resources within your application.

4. **`michel.cache_dir`**: Defines the cache directory path where cached data is stored to improve application performance.

5. **`michel.logs_dir`**: Points to the directory where log files generated by the framework are stored, facilitating debugging and error tracking.

6. **`michel.config_dir`**: Specifies the directory path for configuration files used by the framework.

7. **`michel.public_dir`**: Defines the directory where public assets like CSS, JavaScript, and images are stored.

**Setting Parameters from `.env`**: Many of these non-overridable parameters can initially be defined or influenced by values provided in the `.env` file. For example, you can set the `APP_ENV`, `APP_CACHE_DIR`, `APP_LOG_DIR`, `APP_CONFIG_DIR`, and `APP_PUBLIC_DIR` in your `.env` file to establish their initial values.

**Kernel Configuration**: The framework's kernel (usually the `BaseKernel`) often plays a central role in initializing various aspects of the application, including some of these non-overridable parameters. For instance, the `michel.environment` and `michel.debug` parameters are determined by the kernel based on the `APP_ENV` value in the `.env` file. Similarly, the kernel may set the `michel.project_dir`, `michel.cache_dir`, `michel.logs_dir`, `michel.config_dir`, and `michel.public_dir` parameters.

In essence, the `.env` file and kernel configuration work together to provide a coherent and flexible way to manage these parameters. The `.env` file sets initial values, while the kernel may further configure or derive values based on the environment and other factors.

This flexibility allows developers to adapt their application's behavior and configuration to different environments and scenarios while maintaining a consistent and predictable framework structure.

## Configuration Files: The `framework.php` File

The `framework.php` file, located in the `/config` directory of your project, contains essential configuration settings specific to the Michel Framework. This file is pivotal in defining how the framework operates and can be customized according to your project's requirements.

Here's a detailed breakdown of the sections within the `framework.php` file:

### `server_request` Closure

This section determines how the `ServerRequestInterface` instance is created. By default, the framework utilizes the [Laminas Diactoros](https://docs.laminas.dev/laminas-diactoros/) library to generate a server request from global data (e.g., PHP superglobals). You can modify this closure if you need to change the way server requests are constructed or if you prefer to use a different library.

### `response_factory` Closure

In this part, you specify how the `ResponseFactoryInterface` instance is instantiated. The default configuration employs the Laminas Diactoros library to create a response factory. However, if you prefer an alternative response factory implementation, you can adjust this closure accordingly.

### `container` Closure

Here, you define the creation of the dependency injection container. By default, the framework uses the "PhpDevCommunity\DependencyInjection\Container" class from the "phpdevcommunity/php-dependency-injection" library. This container is responsible for managing and providing instances of various services and dependencies throughout your application.

You have the flexibility to customize this closure to use a different container implementation or to add your container configuration. For instance, if you wish to use PHP-DI as your container, you can modify it.

### `custom_environments` Array

In this section, you can specify custom environments as an array of environment names. Custom environments enable you to configure your application differently based on the environment it is running in. These custom environments can be utilized to adapt the framework to specific project requirements and scenarios.

The `framework.php` file is a critical component of your Michel Framework configuration. Customizing its settings allows you to tailor the framework's behavior to match the unique needs of your project.

By understanding and effectively managing the `.env`, `parameters.php`, and `framework.php` configuration files, you gain fine-grained control over your Michel Framework application, making it versatile and adaptable to a variety of use cases and environments.

