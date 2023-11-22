<?php

declare(strict_types=1);

namespace App;

use Essential\Core\BaseKernel;
use function dirname;

/**
 * @package    Essential
 * @author    Devcoder.xyz <dev@devcoder.xyz>
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.devcoder.xyz
 */
final class Kernel extends BaseKernel
{
    public function getCacheDir(): string
    {
        return getenv('APP_CACHE_DIR') ?: $this->getProjectDir() . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'cache';
    }

    public function getProjectDir(): string
    {
        return dirname(__DIR__);
    }

    public function getLogDir(): string
    {
        return getenv('APP_LOG_DIR') ?: $this->getProjectDir() . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'log';
    }

    public function getConfigDir(): string
    {
        return getenv('APP_CONFIG_DIR') ?: $this->getProjectDir() . DIRECTORY_SEPARATOR . 'config';
    }

    public function getPublicDir(): string
    {
        return getenv('APP_PUBLIC_DIR') ?: $this->getProjectDir() . DIRECTORY_SEPARATOR . 'public';
    }

    public function getEnvFile(): string
    {
        return $this->getProjectDir() . DIRECTORY_SEPARATOR . '.env';
    }

    protected function afterBoot(): void
    {
    }
}
