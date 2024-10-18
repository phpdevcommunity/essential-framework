# Events

The Michel Framework is compatible with PSR-14, which means that all event dispatchers implementing PSR-14 are compatible with the framework. By default, the framework uses the `phpdevcommunity/php-event-dispatcher` library for event handling. You can refer to the documentation [here](https://github.com/phpdevcommunity/php-event-dispatcher) for more details on how to use this library.

Now, let's explore how events are handled within the framework and how you can integrate your event listeners and subscribers.

## Event Configuration

Event configuration in the Michel Framework is managed through the `listeners.php` file located in the `/config` directory. This file allows you to specify event-to-listener mappings for your application.

Here's an example of event configuration in the framework, demonstrating two ways to define event listeners:

1. Single Listener:
```php
return [
   \App\Event\ExampleEvent::class => \App\Listeners\ExampleListener::class
];
```

2. Multiple Listeners (Array):
```php
return [
   \App\Event\ExampleEvent::class => [
       \App\Listeners\ExampleListener::class,
       \App\Listeners\ExampleListener2::class,
       \App\Listeners\ExampleListener3::class,
   ]
];
```
You can choose either of these methods to configure event listeners based on your project requirements.

## Complete Example: Dependency Injection with Event Dispatcher

In this complete example, we'll create a custom event and listener, configure the event dispatcher, and demonstrate dependency injection in a controller. We'll use the Michel Framework's default event dispatcher, `phpdevcommunity/php-event-dispatcher`.

### Step 1: Create a Custom Event

Let's create a custom event class named `ExampleEvent`. This event will carry an object and will be dispatched from the controller.

```php
// src/Event/ExampleEvent.php

namespace App\Event;

use PhpDevCommunity\Listener\Event;

final class ExampleEvent extends Event
{
    private object $object;

    public function __construct(object $object)
    {
        $this->object = $object;
    }

    public function getObject(): object
    {
        return $this->object;
    }
}
```

### Step 2: Create an Event Listener

Next, create an event listener class named `ExampleListener`. This listener will respond to the `ExampleEvent` by logging a message.

```php
// src/Listeners/ExampleListener.php

namespace App\Listeners;

use App\Event\ExampleEvent;
use Psr\Log\LoggerInterface;

final class ExampleListener
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(ExampleEvent $event): void
    {
        $object = $event->getObject();
        $this->logger->info("ExampleListener has received an object with name: {$object->name}");
    }
}
```

### Step 3: Configure Event Listeners

Configure the event listeners in the `listeners.php` configuration file. We will map the `ExampleEvent` to the `ExampleListener`.

```php
// config/listeners.php

return [
    \App\Event\ExampleEvent::class => \App\Listeners\ExampleListener::class,
];
```

### Step 4: Dependency Injection in Controller

Now, let's inject the event dispatcher and demonstrate dependency injection in a controller.

```php
// src/Controllers/MainController.php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use App\Event\ExampleEvent;

class MainController
{
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // Your application logic goes here

        // For demonstration purposes, let's dispatch an example event
        $user = new stdClass();
        $user->name = 'John Doe';

        // Create an instance of your custom event
        $exampleEvent = new ExampleEvent($user);

        // Dispatch the event using the event dispatcher
        $this->eventDispatcher->dispatch($exampleEvent);

        // You can continue your controller logic here

        return response('<h1>Welcome to the Michel Framework!</h1>');
    }
}
```

In this example, we've created a custom event (`ExampleEvent`) and an event listener (`ExampleListener`). We've configured the event listeners in the `listeners.php` configuration file. In the `MainController`, we've injected the `EventDispatcherInterface` and used it to dispatch the `ExampleEvent`. When the controller is invoked, the event listener logs a message based on the event.
