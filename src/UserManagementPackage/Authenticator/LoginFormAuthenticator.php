<?php

namespace App\UserManagementPackage\Authenticator;

use App\UserManagementPackage\UserInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class LoginFormAuthenticator implements AuthenticatorInterface
{
    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge([
            'login_path' => '/login',
            'username_parameter' => 'username',
            'password_parameter' => 'password'
        ], $options);
    }

    public function supports(ServerRequestInterface $request): bool
    {
        return $request->getMethod() === "POST" && $request->getUri()->getPath() === $this->options['login_path'];
    }

    /**
     * Authenticates the user and returns the user object if authentication is successful, otherwise returns null.
     *
     * @param ServerRequestInterface $request
     * @return UserInterface|null
     */
    public function authenticate(ServerRequestInterface $request): ?UserInterface
    {
        $username = $request->getQueryParams()[$this->options['username_parameter']] ?? '';
        $password = $request->getQueryParams()[ $this->options['password_parameter']] ?? '';
    }

    public function onAuthenticationSuccess(ServerRequestInterface $request): ?ResponseInterface
    {
        return null;
    }

    public function onAuthenticationFailure(ServerRequestInterface $request): ?ResponseInterface
    {
        return null;
    }
}