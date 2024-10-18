# Templates and Rendering

The Michel Framework includes a built-in templating system by default, which uses the phpdevcommunity/php-renderer package. This simple PHP renderer allows you to create and render templates easily. You can refer to the official documentation for detailed information: [phpdevcommunity/php-renderer GitHub](https://github.com/phpdevcommunity/php-renderer).

However, if you prefer to use the Twig templating engine, you can easily switch by following these steps:

1. Remove the phpdevcommunity/php-renderer package:

```
composer remove phpdevcommunity/php-renderer
   ```

2. Install Twig using Composer:
```
 composer require twig/twig
```

Twig will now be automatically configured and ready to use as your template engine.

By default, the template directory is set to `/templates` within your project directory. You can modify this path by changing the `APP_TEMPLATE_DIR` variable in your .env file or by modifying the `app.template_dir` parameter in the `parameters.php` file:

```php
'app.template_dir' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'my_custom_templates',
```

Now, let's explore how to create and use templates with the chosen rendering engine.

Voici le sous-chapitre sur les helpers disponibles avec des exemples pour les moteurs de rendu PHP Renderer et Twig :

## Template Helpers

The Michel Framework provides a set of useful template helpers for both PHP Renderer and Twig.

#### `render_view`

The `render_view` function allows you to render a view template with the provided context. It checks if a Renderer service is available and throws an exception if not. This helper is suitable for both PHP Renderer and Twig.

**Usage:**

```php
// PHP Renderer Example
echo render_view('main.html.php', ['data' => $data]);
```

```php
// Twig Example
echo render_view('main.html.twig', ['data' => data]);
```

#### `render`

The `render` function creates an HTTP response from a view template. It is a convenient way to render views and send them as responses. This helper is suitable for both PHP Renderer and Twig.

**Usage:**

```php
// PHP Renderer Example
return render('main.html.php', ['data' => $data], 200);
```

```php
// Twig Example
return render('main.html.twig', ['data' => $data], 200);
```
