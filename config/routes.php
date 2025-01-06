<?php

declare(strict_types=1);

/**
 * Michel PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    Michel
 * @author    PhpDevCommunity
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.phpdevcommunity.com
 */

use App\Controller\ApiController;
use PhpDevCommunity\Route;

return [
    Route::get('index', '/', [\App\Controller\MainController::class]),
    Route::get('api_main', '/api', [ApiController::class]),
];
