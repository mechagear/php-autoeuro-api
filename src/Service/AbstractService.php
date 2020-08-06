<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\ClientInterface;
use JMS\Serializer\SerializerInterface;

abstract class AbstractService
{
    /** @var ClientInterface */
    protected $apiClient;

    /** @var SerializerInterface */
    protected $serializer;

    public function __construct(ClientInterface $apiClient, SerializerInterface $serializer)
    {
        $this->apiClient = $apiClient;
        $this->serializer = $serializer;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->apiClient;
    }

    protected function request(string $method, string $path, array $params = null)
    {
        $params = $params ?? [];
        return $this->getClient()->request($method, $path, $params);
    }

    protected function requestCollection(string $method, string $path, array $params = null)
    {
        $params = $params ?? [];
        return $this->getClient()->request($method, $path, $params);
    }

}
