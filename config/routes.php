<?php

declare(strict_types=1);

/**
 * Pulsar PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package    Pulsar
 * @author    Devcoder.xyz
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.devcoder.xyz
 */

use App\Controller\ApiController;

return [
    \Essential\Core\Router\Route::get('index', '/', [\App\Controller\MainController::class]),
    \Essential\Core\Router\Route::get('api_main', '/api', [ApiController::class]),
];
