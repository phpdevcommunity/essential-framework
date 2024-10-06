<?php

namespace App\UserManagementPackage;

interface UserInterface
{

    public function getId(): int;
    public function getEmail(): string;
    public function getUsername(): string;
    public function getPassword(): ?string;
    public function getRoles(): array;
}