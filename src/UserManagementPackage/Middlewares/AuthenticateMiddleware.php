<?php

namespace App\UserManagementPackage\Middlewares;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthenticateMiddleware implements MiddlewareInterface
{
    private ContainerInterface $container;
    private ResponseFactoryInterface $responseFactory;

    public function __construct(ContainerInterface $container, ResponseFactoryInterface $responseFactory)
    {
        $this->container = $container;
        $this->responseFactory = $responseFactory;
    }
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}