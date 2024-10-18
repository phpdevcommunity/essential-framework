<?php

declare(strict_types=1);

namespace App\Controller;

use PhpDevCommunity\Michel\Core\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
class MainController extends Controller
{

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return render('welcome.html.php');
    }
}
