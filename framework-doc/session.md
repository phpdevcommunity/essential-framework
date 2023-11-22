# Sessions in the Essential Framework

Sessions are a fundamental part of web applications for storing user data across multiple requests. The Essential Framework provides a flexible session management system to handle user sessions effectively. By default, the framework utilizes the [devcoder-xyz/php-session](https://github.com/devcoder-xyz/php-session) library for session management.

Here's an overview of how sessions work within the Essential Framework:

### Default Session Library

The Essential Framework comes pre-configured with the `devcoder-xyz/php-session` library for session management. This library simplifies session handling tasks and ensures that your application can store and retrieve session data securely.

### Accessing the Session Service

The session service in the Essential Framework is available in the dependency injection container using the interface `\DevCoder\Session\Storage\SessionStorageInterface::class`. You can access this service to interact with user sessions within your application.

For example, you can use the following code to access the session service:

```php
use DevCoder\Session\Storage\SessionStorageInterface;

// Inside a controller or service
$sessionStorage = container()->get(SessionStorageInterface::class);

// Now you can use $sessionStorage to work with sessions
```

### Customizing the Session Library

Developers have the flexibility to replace the default session library with another library of their choice. If you prefer to use a different session management library, you can easily remove the `devcoder-xyz/php-session` library and install your preferred library via Composer.

To replace the default library:

1. Remove the `devcoder-xyz/php-session` library from your project:
```
composer remove devcoder-xyz/php-session
```

2. Install your preferred session library via Composer. For example, if you want to use the `laminas/laminas-session` library for session management, you can install it as follows:
```
composer require laminas/laminas-session
```

3. Configure your application to use the newly installed session library as per the documentation of your chosen library. Ensure that your session management logic aligns with the library's conventions and practices.

By customizing the session library, you can tailor the session management process to your specific project requirements and take advantage of the features offered by your chosen library.
