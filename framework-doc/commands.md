# Commands in the Essential Framework

The Essential Framework defaults to using the Symfony Console component for command-line command management. This integration allows you to create and execute commands to automate various tasks within your application.

## Creating a Command

To create a new command, follow these steps:

1. Navigate to the `src/Command` directory of your project.

2. Create a new class for your command, for example, `MyCommand.php`.

3. In this class, extend the `Symfony\Component\Console\Command\Command` class and implement the logic of your command in the `configure` and `execute` methods.

Here's a simple example of a command that displays a message:

```php
// src/Command/MyCommand.php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyCommand extends Command
{
    // The `configure` method is used to configure your command.
    protected function configure()
    {
        $this
            ->setName('my:command') // The name of your command (e.g., my:command)
            ->setDescription('Description of your command');
    }

    // The `execute` method contains the logic of your command.
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello from MyCommand!');
    }
}
```

## Listing Commands

To list available commands and their descriptions, you can use the following command:

```bash
php bin/console list
```

This command will display a list of all registered commands in your application, including the default commands provided by Symfony Console.

## Default Commands

The Essential Framework includes several default commands in its core for common tasks. These commands are available out of the box and can be executed using the Symfony Console. Some of the default commands are:

- `cache:clear`: Clears the application cache.
- `make:controller`: Generates a new controller.
- `make:command`: Generates a new command.
- `debug:env`: Displays debug information about the current environment.

To execute any of these default commands, use the Symfony Console, followed by the command name. For example:

```bash
php bin/console cache:clear
```

## Registering Custom Commands

To register your custom commands, you need to add them to the `commands.php` file located in the `/config` directory of your project. This file contains an array that lists all the registered commands.

Here's an example of how to add your custom `MyCommand` to the list of registered commands:

```php
// config/commands.php

#--------------------------------------------------------------------
# List of Commands
#--------------------------------------------------------------------
return [
    App\Command\MyCommand::class,
];
```

With this configuration, your custom command `MyCommand` will be available for execution using the Symfony Console.

By following these guidelines, you can create, manage, and execute commands in your Essential Framework application efficiently. Custom commands are a powerful tool for automating tasks and managing various aspects of your application's functionality.