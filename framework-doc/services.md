# Service Containers

## PSR-11 Compatibility

The Essential Framework fully embraces the principles of [PSR-11](https://www.php-fig.org/psr/psr-11/), which is a standard recommendation by the PHP-FIG (PHP Framework Interop Group) for creating and interacting with service containers in PHP. This compatibility means that any container that adheres to PSR-11 standards can be seamlessly integrated with the framework.

## Default Container

Upon installation, the Essential Framework comes equipped with the `devcoder-xyz/php-dependency-injection` container as the default service container. This container is pre-configured and provides robust support for managing services and their dependencies within the framework.

## Configuring Alternative Service Containers

In addition to the default service container, the Essential Framework offers flexibility in choosing alternative containers that suit your project requirements. You can easily switch to using the [PHP-DI](https://php-di.org/) container, for instance, by making a few modifications.

### Using PHP-DI as the Service Container

To replace the default service container with PHP-DI, follow these steps:

1. Remove the `devcoder-xyz/php-dependency-injection` package from your project's dependencies by running:

```bash
composer remove devcoder-xyz/php-dependency-injection
```

2. Install PHP-DI by running:

```bash
composer require php-di/php-di
```

3. Open the `config/framework.php` file in your project directory.

4. Modify the 'container' definition in the file as follows:

```php
/**
* @return ContainerInterface
* You can change it
*/
'container' => static function (array $definitions, array $options): ContainerInterface {
   /**
    * PHP-DI Example: composer require php-di/php-di
    */
   $builder = new DI\ContainerBuilder();
   $builder->addDefinitions($definitions);
   return $builder->build();
},
```

By making these changes, you configure the Essential Framework to utilize PHP-DI as the service container. This offers you the flexibility and extensive features provided by PHP-DI for managing services and their dependencies within your application.

## Services Configuration in `services.php`

The `services.php` file located in the `/config` directory plays a crucial role in configuring essential services within your Essential Framework application. By default, the framework comes preconfigured with several essential services. Below is an overview of these services and their respective configurations:

### 1. `BasePath`

- **Description**: The `BasePath` service helps adjust the base path of your application. It is particularly useful when your application is hosted in a subdirectory.

- **Configuration**:
```php
BasePath::class => static function (ContainerInterface $container) {
  return new BasePath($container->get('app.url'));
},
  ```

### 2. `SessionStorageInterface`

- **Description**: The `SessionStorageInterface` service handles session management in your application.

- **Configuration**:
```php
SessionStorageInterface::class => static function (ContainerInterface $container) {
  return new NativeSessionStorage();
},
```

### 3. `Flash`

- **Description**: The `Flash` service is responsible for handling flash messages within your application. Flash messages are typically used for displaying one-time notifications to users.

- **Configuration**:
```php
Flash::class => static function (ContainerInterface $container) {
  $session = $container->get(SessionStorageInterface::class);
  return new DevCoder\Flash\Flash($session);
},
```

These services are configured by default to provide essential functionality for your Essential Framework application. Depending on your project's requirements, you can extend this list by defining additional services in the `services.php` file or customize the existing configurations as needed.

## Retrieving Services

In the Essential Framework, services are essential components of your application that provide various functionalities. You can retrieve these services in different ways depending on your preference and requirements.

### 1. Retrieving Services in a Controller

#### Using the `$this->get()` Method

One way to retrieve services in a controller is by extending the `Essential\Core\Controller\Controller` class and using the `$this->get(Service::class)` method. Here's an example:

```php
use DevCoder\Flash\Flash;
use Essential\Core\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MainController extends Controller
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        /**
         * @var Flash $flash
         */
        $flash = $this->get(Flash::class);
        $flash->set('error', 'An error has occurred');
        return redirect('/');
    }
}
```

#### Using Dependency Injection

Another way to retrieve services is by injecting them directly into your controller's constructor. Here's an example:

```php
use DevCoder\Flash\Flash;
use Essential\Core\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MainController extends Controller
{
    private Flash $flash;

    public function __construct(Flash $flash)
    {
        $this->flash = $flash;
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $this->flash->set('error', 'An error has occurred');
        return redirect('/');
    }
}
```

### 2. Retrieving Services Globally

#### Using the `container()` Function

You can use the `container()` function to access services when needed. This approach can be particularly useful when you want to retrieve services outside of controller contexts. Here's an example of how you can use it:

```php
// Accessing a service globally using the container() function
$flash = container()->get(Flash::class);
$flash->set('error', 'An error has occurred');
return redirect('/');
```

Choose the method that best fits your application's structure and coding style to efficiently retrieve services and make them available for your application's functionality.