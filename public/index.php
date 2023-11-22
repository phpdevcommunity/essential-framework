<?php
/**
 * Essential PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    Essential
 * @author    Devcoder.xyz
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.devcoder.xyz
 */

use App\Kernel;

if (phpversion() < '7.4') {
    die('Your PHP version must be 7.4 or higher to run Essential PHP Framework. Your version: ' . phpversion());
}

define('ESSENTIAL_COMPOSER_AUTOLOAD_FILE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
require_once ESSENTIAL_COMPOSER_AUTOLOAD_FILE;

$kernel = new Kernel();
$response = $kernel->handle(create_request());
\send($response);
