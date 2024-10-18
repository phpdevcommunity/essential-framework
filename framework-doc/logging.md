# Logging in the Michel Framework

The Michel Framework adheres to the PSR-3 standard for logging, ensuring compatibility with any library that implements the PSR-3 LoggerInterface. This flexibility allows developers to choose their preferred logging library while benefiting from standardized logging practices.

### Default Logging Library

By default, the Michel Framework uses the [phpdevcommunity/php-logging](https://github.com/phpdevcommunity/php-logging) library for logging. This library simplifies the process of configuring and managing logs in your application.

#### Accessing the Logger

To work with logging in your Michel Framework application, you can access the logger service through the dependency injection container using the interface `\Psr\Log\LoggerInterface::class`.

Here's how you can access the logger service in your code:

```php
use Psr\Log\LoggerInterface;

// Inside a controller or service
$logger = container()->get(LoggerInterface::class);

// Now you can use $logger to log messages, errors, and events
```

### Customizing the Logging Library

Developers have the flexibility to replace the default logging library with another library of their choice. If you prefer to use a different logging library that implements the PSR-3 standard, you can easily remove the `phpdevcommunity/php-logging` library and install your preferred library via Composer.

To replace the default library:

1. Remove the `phpdevcommunity/php-logging` library from your project:
```
composer remove phpdevcommunity/php-logging
```

2. Install your preferred logging library via Composer. Ensure that the library is compatible with PSR-3 and follow its documentation for configuration and usage. For example, you can install your preferred library as follows:
```
composer require monolog/monolog
```

3. Modify the `services.php` file located in the `/config` directory to configure the container to use your chosen logging library. Refer to your preferred library's documentation for specific configuration instructions.

```php
// config/services.php

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

return [

    // Other service definitions...

    // Logger Configuration
    LoggerInterface::class => static function (ContainerInterface $container) {
        $logFileName = $container->get('michel.logs_dir') . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
        
        // Create a Monolog logger instance with a StreamHandler
        $logger = new Logger('my_logger');
        $logger->pushHandler(new StreamHandler($logFileName, Logger::INFO));
        
        return $logger;
    },
];
```

In this example, we're configuring the `services.php` file to define a custom logger service using the Monolog library. This logger writes log messages to a daily log file in the directory specified by `'michel.logs_dir'`. You can adjust the log level and handler configuration according to your specific logging requirements.

Now, you can access this logger in your code as shown in the documentation:

```php
use Psr\Log\LoggerInterface;

// Inside a controller or service
$logger = container()->get(LoggerInterface::class);

// Now you can use $logger to log messages, errors, and events
```


