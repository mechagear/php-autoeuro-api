<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{

    public function request(string $method, string $path, array $params = null): ResponseInterface;

}