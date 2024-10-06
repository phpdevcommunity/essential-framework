<?php

namespace App\UserManagementPackage;

use Essential\Core\Package\PackageInterface;

class UserManagementPackage implements PackageInterface
{

    public function getDefinitions(): array
    {
        return [];
    }

    public function getParameters(): array
    {
        return [
            'user.management.password_min_length' => 8,
            'user.management.force_password_change_every' => 0,

            'user.management.guest_can_create_account' => false,
            'user.management.guest_can_login' => false,

            'user.management.auth_two_factor' => false,
            'user.management.auth_two_factor_methods' => ['email'],
            'user.management.roles' => ['user', 'admin'],
            'user.management.role_default' => 'user',
        ];
    }

    public function getRoutes(): array
    {
        return [];
    }

    public function getListeners(): array
    {
        return [];
    }

    public function getCommands(): array
    {
        return [];
    }
}