# Middleware in the Michel Framework

Middleware plays a crucial role in the Michel Framework, allowing you to perform actions before and after handling an HTTP request. The framework is fully compatible with the PSR-15 standard, which means that any PSR-15 middleware can be used seamlessly with the framework.

## Default Middleware Configuration

In the Michel Framework, middleware is defined and configured in the `config/middleware.php` file. Let's explore the default middleware configuration:

```php
return [
    \Middlewares\BasePath::class => ['dev', 'prod'],
    \PhpDevCommunity\Michel\Core\Middlewares\RouterMiddleware::class => ['dev', 'prod'],
    \PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware::class => ['dev', 'prod'],
];
```

Here's an explanation of each middleware:

### 1. `\Middlewares\BasePath::class`

- **Description**: The BasePath middleware adjusts the base path of the application based on the `app.url` parameter from the container, which is populated by the `APP_URL` environment variable defined in the `.env` file. This middleware is essential when your application is hosted in a subdirectory, as it ensures that routing and URLs are correctly generated to reflect the correct base path.

### 2. `\PhpDevCommunity\Michel\Core\Middlewares\RouterMiddleware::class`

- **Description**: The RouterMiddleware is a fundamental middleware responsible for routing incoming HTTP requests to the appropriate controller action. It examines the routes defined in your application and determines which controller should handle the request.

### 3. `\PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware::class`

- **Description**: The ControllerMiddleware is another critical middleware in the Michel Framework. It processes the HTTP request, resolves the controller, and executes the appropriate action method. It also handles dependency injection into controllers.

## Middleware Execution Order

It's important to note that middleware in the Michel Framework is executed in the order they are defined in the `middleware.php` configuration file. Middleware at the beginning of the list will be executed first, while middleware at the end will be executed last.

For proper framework functionality, ensure that the `\PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware::class` is always placed last in the list of middleware. This ensures that the controller action is executed after routing and other necessary processing.

## Middleware Execution in Different Environments

The Michel Framework supports different environments to accommodate various development stages. Two primary environments are defined: `dev` and `prod`.

- **Development (dev) Environment**: When the application runs in the `dev` environment, the following middlewares are executed:
    - `\Middlewares\BasePath::class`
    - `\PhpDevCommunity\Michel\Core\Middlewares\RouterMiddleware::class`
    - `\PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware::class`

- **Production (prod) Environment**: In the `prod` environment, the same middlewares as in the `dev` environment are executed:
    - `\Middlewares\BasePath::class`
    - `\PhpDevCommunity\Michel\Core\Middlewares\RouterMiddleware::class`
    - `\PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware::class`

The distinction between the environments allows you to configure your application differently based on whether it's in a development or production context, providing flexibility and performance optimization during different stages of your project.

## Custom Development Middleware

In the "dev" environment, you can configure custom middlewares that aid in debugging, logging, or other development-related tasks. These middlewares help streamline development and can be excluded in the production environment to optimize performance.

Let's create a fictional middleware called `DebugMiddleware` as an example. This middleware logs information about incoming requests for debugging purposes.

```php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DebugMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Log information about the incoming request
        $requestInfo = [
            'Method' => $request->getMethod(),
            'URI' => (string) $request->getUri(),
            'Headers' => $request->getHeaders(),
        ];

        // Log the request info (You can replace this with your preferred logging mechanism)
        error_log("Incoming Request Info:\n" . json_encode($requestInfo, JSON_PRETTY_PRINT));

        // Continue processing the request
        return $handler->handle($request);
    }
}
```

Next, you would configure this middleware in your `config/middleware.php` file to execute it only in the "dev" environment:

```php
return [
    // Other middleware entries...

    \Middlewares\BasePath::class => ['dev', 'prod'],

    // Custom development middleware entry
    \App\Middleware\DebugMiddleware::class => ['dev'],
    
    \PhpDevCommunity\Michel\Core\Middlewares\RouterMiddleware::class => ['dev', 'prod'],
    \PhpDevCommunity\Michel\Core\Middlewares\ControllerMiddleware::class => ['dev', 'prod'],
];
```

In this example, the `DebugMiddleware` is configured to run only in the "dev" environment. It logs request information to assist developers in debugging their applications. During production (i.e., the "prod" environment), this middleware is excluded to minimize overhead and improve performance.
