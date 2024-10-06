<?php

namespace App\UserManagementPackage\Authentication;

use App\UserManagementPackage\Authenticator\AuthenticatorInterface;
use App\UserManagementPackage\UserInterface;
use Exception;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class AuthenticationManager
{
    /**
     * @var iterable<AuthenticatorInterface>
     */
    private iterable $authenticators;
    private ResponseFactoryInterface $responseFactory;

    public function __construct(iterable $authenticators, ResponseFactoryInterface $responseFactory)
    {
        $this->authenticators = $authenticators;
        $this->responseFactory = $responseFactory;
    }

    public function authenticateRequest(ServerRequestInterface $request): ResponseInterface
    {
        foreach ($this->authenticators as $authenticator) {

            if (!$authenticator instanceof AuthenticatorInterface) {
                throw new Exception('Authenticator must implement AuthenticatorInterface');
            }

            if ($authenticator->supports($request) === false) {
                continue;
            }

            try {
                $user = $authenticator->authenticate($request);
                if (!$user instanceof UserInterface) {
                    throw new Exception('Authenticator must return an instance of UserInterface');
                }
                return $authenticator->onAuthenticationSuccess($request);
            } catch (Throwable $e) {
                return $authenticator->onAuthenticationFailure($request);
            }
        }

        $this->responseFactory->createResponse(401);
    }

}