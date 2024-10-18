<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use PhpDevCommunity\Michel\Core\BaseKernel;
use PhpDevCommunity\Michel\Core\Controller\Controller;

final class ApiController extends Controller
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return json_response([
            'framework' => BaseKernel::NAME . ' PHP micro-framework',
            'version' => BaseKernel::VERSION,
            'title' => 'Fast and light Framework for PHP',
            'sub_title' => 'Size : 2,9MB with the dependencies (production environment)',
            'detail' => 'Set up web applications and APIs with clean, simple code and very easy configuration. You choose which components you want to use, nothing is imposed! No configuration in YML, .ini or xml, only PHP',
            'other' => 'Made with ❤ in Paris by PhpDevCommunity (F. Michel.R) Contact us'
        ]);
    }
}
