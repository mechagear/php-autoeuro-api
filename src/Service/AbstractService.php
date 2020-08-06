<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\ClientInterface;

abstract class AbstractService
{
    /** @var ClientInterface */
    protected $apiClient;

    public function __construct(ClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->apiClient;
    }

    protected function request($method, $path, $params, $opts)
    {
        return $this->getClient();
    }

}
