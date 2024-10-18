# Validation in the Michel Framework

The Michel Framework simplifies data validation and ensures that your application processes only valid and sanitized user input. By default, the framework uses the [phpdevcommunity/php-validator](https://github.com/phpdevcommunity/php-validator) library, which provides powerful validation capabilities.

Here's an overview of how validation works within the Michel Framework:

### Default Validator Library

The framework comes pre-configured with the `phpdevcommunity/php-validator` library for validation tasks. This library offers a wide range of validation rules and methods to verify various types of user input, such as form submissions, API requests, or any other data that your application receives.

### Customizing the Validator Library

Developers have the flexibility to replace the default validator library with another library of their choice. If you prefer to use a different validation library, you can easily remove the `phpdevcommunity/php-validator` library and install your preferred library via Composer.

To replace the default library:

1. Remove the `phpdevcommunity/php-validator` library from your project:
```
composer remove phpdevcommunity/php-validator
```

2. Install your preferred validation library via Composer. For example, if you want to use the `symfony/validator` library, you can install it as follows:
```
composer require symfony/validator
```

3. Configure your application to use the newly installed validation library as per the documentation of your chosen library. Ensure that your validation logic aligns with the library's conventions and practices.

By customizing the validation library, you can tailor the validation process to your specific project requirements and take advantage of the features offered by your chosen library.
