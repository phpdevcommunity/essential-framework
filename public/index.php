<?php
/**
 * Michel PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    PhpDevCommunity Michel
 * @author    PhpDevCommunity
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.phpdevcommunity.com
 */

use App\Kernel;

if (phpversion() < '7.4') {
    die('Your PHP version must be 7.4 or higher to run Michel PHP Framework. Your version: ' . phpversion());
}

define('MICHEL_COMPOSER_AUTOLOAD_FILE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
require_once MICHEL_COMPOSER_AUTOLOAD_FILE;

$kernel = new Kernel();
$response = $kernel->handle(create_request());
\send_http_response($response);
