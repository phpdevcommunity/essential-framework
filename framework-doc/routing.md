## Creating Custom Routes

One of the fundamental aspects of building web applications is defining routes that map incoming requests to specific actions. In the Essential Framework, you can easily create custom routes to handle various endpoints.

To create custom routes, follow these steps:

1. Open the `config/routes.php` file in your project directory.

2. Inside the `routes.php` file, you'll find an array that contains some default routes. You can add your custom routes to this array.

```php
return [
    \Essential\Core\Router\Route::get('index', '/', [\App\Controller\MainController::class]),
    \Essential\Core\Router\Route::get('api_main', '/api', [\App\Controller\ApiController::class]),
    
    // Add your custom routes here
];
```

3. To define a new route, use the `\Essential\Core\Router\Route` class, followed by the HTTP method you want to use (`get`, `post`, `put`, `delete`, etc.), a unique route name, the URI pattern, and an array of controller information.

For example, let's say you want to create a route that maps to a `UserController` when users visit the `/users` URL:

```php
return [
    // ... (existing routes)

    // Custom route for users
    \Essential\Core\Router\Route::get('users', '/users', [\App\Controller\UserController::class]),
];
```

4. The `get` method specifies that this route responds to HTTP GET requests. You can replace it with other HTTP verbs like `post`, `put`, `delete`, etc., depending on the desired behavior.

5. The route name should be unique to help you identify and generate URLs for this route later.

6. The URI pattern defines the path that triggers this route. In this case, visiting `/users` will trigger the `UserController`.

7. The array of controller information should contain the controller class that will handle the request. Make sure to specify the correct namespace and class name.

8. Save the `routes.php` file.

9. Your custom route is now defined and ready to be used. Whenever a user visits `/users` in their browser, the `UserController` will handle the request.

Remember to tailor your custom routes to your application's specific requirements. You can create as many custom routes as needed to handle various endpoints in your application.

## Router

The Essential Framework comes with a built-in router, [devcoder-xyz/php-router](https://github.com/devcoder-xyz/php-router), to handle routing within your application. This router is pre-configured and ready to use. However, if you prefer to use a different routing library, such as Aura Router or Symfony Routing, you can easily replace the default router.

### Replacing the Default Router

#### Aura Router Example

To switch to Aura Router, follow these steps:

1. Install Aura Router using Composer:

```bash
composer require aura/router
```

2. Remove the default router package:

```bash
composer remove devcoder-xyz/php-router
```

3. Configure the router in your `services.php` file located in the `config` directory:

```php
'router' => static function (ContainerInterface $container): object {
   $routes = $container->get('essential.routes');
   $factory = new \Essential\Core\Router\Bridge\RouteFactory();

   // Create and configure the Aura Router container
   $router = new \Aura\Router\RouterContainer();

   // Add routes to the Aura Router container
   foreach ($routes as $route) {
       $router->getMap()->addRoute($factory->createAuraRoute($route));
   }

   return $router;
},
```

#### Symfony Routing Example

To switch to Symfony Routing, follow these steps:

1. Install Symfony Routing using Composer:

```bash
composer require symfony/routing
```

2. Remove the default router package:

```bash
composer remove devcoder-xyz/php-router
```

3. Configure the router in your `services.php` file located in the `config` directory:

```php
'router' => static function (ContainerInterface $container): object {
   $routes = $container->get('essential.routes');
   $factory = new \Essential\Core\Router\Bridge\RouteFactory();

   // Create a Symfony RouteCollection
   $router = new \Symfony\Component\Routing\RouteCollection();

   // Add routes to the Symfony RouteCollection
   foreach ($routes as $route) {
       $router->add($route->getName(), $factory->createSymfonyRoute($route));
   }

   return $router;
},
   ```

Now you can use the router of your choice to define and handle routes in your Essential Framework application.

## Defining Routes

In the Essential Framework, you can define routes to specify how different HTTP requests are handled. Routes are defined in the `routes.php` configuration file, which is located in the `config` directory of your project. The `Route` class allows you to define routes with various HTTP methods and handlers.

### Basic Route Example

Here's a basic example of defining a route using the `Route` class:

```php
use Essential\Core\Router\Route;

// Define a GET route named 'home' for the root path '/'
Route::get('home', '/', [HomeController::class]);
```

In this example:
- `Route::get('home', '/', [HomeController::class])` defines a route named 'home' for the root path '/' that handles HTTP GET requests. The route directs requests to the `HomeController` class.

### Route with Custom HTTP Methods

You can specify custom HTTP methods for a route using the `methods` parameter. For example, here's how to define a route that handles a PATCH request:

```php
use Essential\Core\Router\Route;

// Define a custom route for the path '/custom' that handles PATCH requests
$customRoute = new Route('custom', '/custom', [CustomController::class], ['PATCH']);
```

In this example, the `['PATCH']` array specifies that the route can handle HTTP PATCH requests. You can customize the array to specify any custom HTTP methods required for your routes.
### Handling Routes with Controllers and Methods

You can define routes that direct requests to specific controller methods. Here's an example:

```php
use Essential\Core\Router\Route;

// Define a route named 'user_profile' for the path '/user/profile' that calls the 'show' method on the 'UserProfileController' class
Route::get('user_profile', '/user/profile', [UserProfileController::class, 'show']);
```

In this example:
- `Route::get('user_profile', '/user/profile', [UserProfileController::class, 'show'])` defines a route named 'user_profile' for the path '/user/profile' that calls the 'show' method on the `UserProfileController` class when the route is accessed with an HTTP GET request.

### Route with Specific HTTP Methods

You can also define routes that respond to specific HTTP methods like POST, PUT, or DELETE. Here's an example of defining a POST route:

```php
use Essential\Core\Router\Route;

// Define a POST route named 'create_post' for the path '/posts' that handles creating new posts
Route::post('create_post', '/posts', [PostController::class, 'create']);
```

In this example, `Route::post('create_post', '/posts', [PostController::class, 'create'])` specifies a POST route named 'create_post' for the path '/posts' that calls the 'create' method on the `PostController` class when a POST request is made to this route.

These examples demonstrate how to define routes in your Essential Framework application. You can create routes that handle different HTTP methods and direct requests to specific controllers and methods based on your application's requirements.