# Flash Messages in the Michel Framework

Flash messages are a common way to display short-lived notifications to users after certain actions in web applications. The Michel Framework includes a convenient flash message system to manage and display flash messages. By default, the framework utilizes the [phpdevcommunity/php-flash](https://github.com/phpdevcommunity/php-flash) library for flash message management.

Here's an overview of how flash messages work within the Michel Framework:

### Default Flash Message Library

The Michel Framework comes pre-configured with the `phpdevcommunity/php-flash` library for flash message management. This library simplifies the process of creating, storing, and rendering flash messages in your application.

### Accessing the Flash Message Service

To work with flash messages in your Michel Framework application, you can access the flash message service through the dependency injection container using the class `\PhpDevCommunity\Flash\Flash::class`.

Here's how you can access the flash message service in your code:

```php
use PhpDevCommunity\Flash\Flash;

// Inside a controller or service
$flash = container()->get(Flash::class);

// Now you can use $flash to manage flash messages
```

### Customizing the Flash Message Library

Developers have the flexibility to replace the default flash message library with another library of their choice. If you prefer to use a different library for managing flash messages, you can easily remove the `phpdevcommunity/php-flash` library and install your preferred library via Composer.

To replace the default library:

1. Remove the `phpdevcommunity/php-flash` library from your project:
```
composer remove phpdevcommunity/php-flash
```

2. Install your preferred flash message library via Composer. For example, if you want to use a different library, install it as per its documentation:
```
composer require your-preferred-flash-library
```

3. Configure your application to use the newly installed flash message library according to the library's documentation. Ensure that your flash message management logic aligns with the library's conventions and practices.

By customizing the flash message library, you can tailor the flash message handling process to your specific project requirements and leverage the features offered by your chosen library.
