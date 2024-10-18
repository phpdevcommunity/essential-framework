<?php

declare(strict_types=1);

namespace App;

use PhpDevCommunity\Michel\Core\BaseKernel;
use function dirname;

/**
 * @package    PhpDevCommunity Michel
 * @author    PhpDevCommunity <michel@phpdevcommunity.com>
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://www.phpdevcommunity.com
 */
final class Kernel extends BaseKernel
{
    public function getCacheDir(): string
    {
        return getenv('APP_CACHE_DIR') ?: filepath_join($this->getProjectDir(), 'var', 'cache');
    }

    public function getProjectDir(): string
    {
        return dirname(__DIR__);
    }

    public function getLogDir(): string
    {
        return getenv('APP_LOG_DIR') ?: filepath_join($this->getProjectDir(), 'var', 'log');
    }

    public function getConfigDir(): string
    {
        return getenv('APP_CONFIG_DIR') ?: filepath_join( $this->getProjectDir(), 'config');
    }

    public function getPublicDir(): string
    {
        return getenv('APP_PUBLIC_DIR') ?: filepath_join($this->getProjectDir() , 'public');
    }

    public function getEnvFile(): string
    {
        return filepath_join($this->getProjectDir() , '.env');
    }

    protected function afterBoot(): void
    {
    }
}
