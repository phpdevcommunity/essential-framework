<?php

namespace App\UserManagementPackage\Authenticator;

use App\UserManagementPackage\UserInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Request;

interface AuthenticatorInterface
{

    /**
     * Checks if the authenticator supports the given server request.
     *
     * @param ServerRequestInterface $request The server request to check.
     * @return bool Returns true if the authenticator supports the request, false otherwise.
     */
    public function supports(ServerRequestInterface $request): bool;

    /**
     * Authenticates the user and returns the user object if authentication is successful, otherwise returns null.
     *
     * @param ServerRequestInterface $request
     * @return UserInterface|null
     */
    public function authenticate(ServerRequestInterface $request): ?UserInterface;

    /**
     * Handles the success event when authentication is successful.
     *
     * @param ServerRequestInterface $request The server request object.
     * @return ResponseInterface|null The response object, or null if no response is needed.
     */
    public function onAuthenticationSuccess(ServerRequestInterface $request): ?ResponseInterface;

    /**
     * Handles the authentication failure event.
     *
     * @param ServerRequestInterface $request The server request object.
     * @return ResponseInterface|null The response object, or null if no response is returned.
     */
    public function onAuthenticationFailure(ServerRequestInterface $request): ?ResponseInterface;
}