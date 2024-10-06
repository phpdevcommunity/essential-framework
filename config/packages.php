<?php


declare(strict_types=1);

/**
 * Essential PHP Framework
 *
 * An open source application development framework for PHP
 *
 * @package	Essential
 * @author	Devcoder.xyz
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://www.devcoder.xyz
 */

#--------------------------------------------------------------------
# List of packages
#--------------------------------------------------------------------
return [
    \Essential\Core\Package\EssentialCorePackage::class => ['dev', 'prod'],
    \App\UserManagementPackage\UserManagementPackage::class => ['dev', 'prod'],
];