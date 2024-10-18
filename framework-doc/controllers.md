# Controllers

Controllers are an essential part of the Michel Framework, responsible for handling incoming HTTP requests, processing application logic, and returning HTTP responses. In this chapter, we'll explore how to create controllers and define routes to handle specific HTTP requests.

## Introduction

In the Michel Framework, controllers play a central role in processing incoming requests. A controller is a PHP class that contains methods to handle different HTTP actions (e.g., GET, POST, etc.). These methods receive an HTTP request, process it, and return an HTTP response.

Here's a basic example of a controller class:

```php
class MainController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // Your application logic goes here
        // You can generate HTML, retrieve data, and return a response

        // For demonstration purposes, let's return a basic HTML response
        return response('<h1>Welcome to the Michel Framework!</h1>');
    }
}
```

## Controller Methods

Controller methods are responsible for processing specific HTTP actions. In the example above, the `MainController` class contains an `__invoke` method, which is a special method that gets executed when the controller is called. This method receives an HTTP request and should return an HTTP response.

You can create additional methods in your controllers to handle various actions. For example, you might have a `UserController` with methods like `index` to display a list of users, `show` to view a specific user's details, and `store` to create a new user.

## Creating Controllers

To create a controller, you can follow these steps:

1. Create a new PHP class in your project's `src/Controller` directory (or any location you prefer).
2. Define methods in the class to handle different HTTP actions.
3. Each method should accept an HTTP request as a parameter and return an HTTP response.

Here's a basic example of creating a controller:

```php
// Create a new controller class in the 'src' directory
class UserController
{
    // Controller method to display a list of users
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        // Your logic to fetch and display users
    }

    // Controller method to view a specific user's details
    public function show(ServerRequestInterface $request): ResponseInterface
    {
        // Your logic to retrieve and display user details
    }

    // Controller method to create a new user
    public function store(ServerRequestInterface $request): ResponseInterface
    {
        // Your logic to handle user creation
    }
}
```

## Defining Routes

To make your controllers accessible via HTTP routes, you need to define routes in your project's `config/routes.php` file. Each route should specify the controller to be called and the HTTP method it should handle.

Here's an example of defining a route that maps to the `UserController` class:

```php
use PhpDevCommunity\Michel\Core\Router\Route;
use App\Controller\UserController;

// Define a route that maps to the UserController's 'index' method
Route::get('users', '/users', [UserController::class, 'index']);
```

In this example, the `Route::get` method specifies that the `UserController`'s `index` method should be invoked when an HTTP GET request is made to the `/users` path.

This concludes our introduction to controllers in the Michel Framework. In the next chapters, we'll dive deeper into routing and explore how to define custom routes for your application.

# Dependency Injection and Helpers

In the Michel Framework, you can leverage dependency injection to inject services and dependencies directly into your controller methods. Additionally, the framework provides various helper functions to simplify common tasks when building your application. In this chapter, we'll explore dependency injection, available helpers, and provide examples.

## Dependency Injection in Controllers

Controllers in the Michel Framework support constructor dependency injection. This means you can type-hint your controller's constructor parameters, and the framework will automatically inject the required services when calling your controller methods.

Let's take a look at an example controller that demonstrates dependency injection:

```php
use PhpDevCommunity\Session\Storage\SessionStorageInterface;
use PhpDevCommunity\Michel\Core\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MainController extends Controller
{
    private SessionStorageInterface $sessionStorage;

    public function __construct(SessionStorageInterface $sessionStorage)
    {
        $this->sessionStorage = $sessionStorage;
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // Redirect using the router
        $router = $this->get('router');
        return redirect($router->generateUri('homepage'));

        // JSON response
        return json_response([
            'status' => true,
            'message' => 'your message'
        ]);

        // Render a view
        return render('main.html.php', [
            'current_user' => $this->sessionStorage->get('user')
        ]);

        // Return a basic HTML response
        return response('<h1>Welcome to the Michel Framework!</h1>');
    }
}
```

In this example, the `MainController` class injects a `SessionStorageInterface` instance via the constructor. The injected dependency is then used within the `__invoke` method to retrieve session data.

## Available Helpers

The Michel Framework includes a set of helper functions to streamline common tasks in your controllers and views. Here are some of the available helpers:

### Redirecting

- `redirect(string $uri, int $statusCode = 302): ResponseInterface`: Redirects the user to the specified URI.

### Generating JSON Responses

- `json_response(array $data, int $status = 200, int $flags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES): ResponseInterface`: Creates a JSON response with the provided data and optional JSON encoding flags.

### Rendering Views

- `render_view(string $view, array $context = []): string`: Renders a view template with the provided context data and returns the rendered view as a string.

- `render(string $view, array $context = [], int $status = 200): ResponseInterface`: Renders a view template and creates an HTTP response with the rendered view. You can specify the HTTP status code for the response.

### Creating Basic Responses

- `response(string $content = '', int $status = 200): ResponseInterface`: Generates a basic text or HTML response with the given content and optional HTTP status code.

These helpers can be used within your controller methods to simplify common tasks and return appropriate responses.
