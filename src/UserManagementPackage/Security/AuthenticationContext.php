<?php

namespace App\UserManagementPackage\Security;

use App\UserManagementPackage\UserInterface;

final class AuthenticationContext
{
    private ?UserInterface $authenticatedUser;

    public function setAuthenticatedUser(UserInterface $user): void
    {
        $this->authenticatedUser = $user;
    }

    // Get the authenticated user
    public function getAuthenticatedUser(): ?UserInterface
    {
        return $this->authenticatedUser;
    }

    public function isAuthenticated(): bool
    {
        return $this->authenticatedUser instanceof UserInterface;
    }
}