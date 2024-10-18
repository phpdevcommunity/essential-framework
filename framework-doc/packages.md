# Creating an PhpDevCommunity Michel Package

In Michel Framework, you can create packages, which are equivalent to bundles in Symfony. This allows you to organize and share reusable components across different projects. To create an PhpDevCommunity Michel package, you need to implement the `PackageInterface` and define your package's services, parameters, event listeners, routes, and commands.

## Package Interface

Start by creating a package class that implements the `PackageInterface`. This interface defines the methods you need to implement for your package.

```php
<?php

namespace PhpDevCommunity\Michel\Core\Package;

interface PackageInterface
{
    public function getDefinitions(): array;

    public function getParameters(): array;

    public function getListeners(): array;

    public function getRoutes(): array;

    public function getCommands(): array;
}
```

## Example Package

Here's an example of an PhpDevCommunity Michel package class (`MyCustomPackage`) that implements the `PackageInterface`. This package provides some default definitions, parameters, and commands. Note that this is just an example; you should create your own package based on your project's requirements.

```php
final class MyCustomPackage implements PackageInterface
{
    public function getDefinitions(): array
    {
        // Implement your service definitions here
        return [];
    }

    public function getParameters(): array
    {
        // Define package-specific parameters here
        return [];
    }

    public function getListeners(): array
    {
        // Specify event listeners provided by your package
        return [];
    }

    public function getRoutes(): array
    {
        // Define package-specific routes here
        return [];
    }

    public function getCommands(): array
    {
        // List console commands provided by your package
        return [];
    }
}
```

## Defining Your Package

### Implementing getDefinitions

In the `getDefinitions` method, define the services your package provides. You can use the Dependency Injection Container to create and configure these services.

### Implementing getParameters

The `getParameters` method allows you to define parameters specific to your package. These parameters can be customized in the project's configuration.

### Implementing getListeners

If your package includes event listeners, define them in the `getListeners` method.

### Implementing getRoutes

If your package provides routes, specify them in the `getRoutes` method.

### Implementing getCommands

If your package includes console commands, list them in the `getCommands` method.

## Activating Your Package

To activate your package in an PhpDevCommunity Michel project, you need to modify the `packages.php` file located in the `/config` directory. Add your package class to the list of packages along with the environment(s) where it should be active.

```php
<?php

// /config/packages.php

return [
    MyCustomPackage::class => ['dev', 'prod'],
];
```

In this example, the `MyCustomPackage` is activated for both the 'dev' and 'prod' environments. You can adjust the list of environments as needed.

By following these steps, you can create and activate your PhpDevCommunity Michel packages to extend the functionality of your projects.
