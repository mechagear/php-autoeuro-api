<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\ClientInterface;
use JMS\Serializer\SerializerInterface;

abstract class AbstractServiceFactory
{
    /** @var ClientInterface */
    private $apiClient;

    /** @var array<string, AbstractService> */
    private $services;

    /** @var SerializerInterface */
    private $serializer;

    /**
     * AbstractServiceFactory constructor.
     * @param ClientInterface $apiClient
     * @param SerializerInterface $serializer
     */
    public function __construct(ClientInterface $apiClient, SerializerInterface $serializer)
    {
        $this->apiClient = $apiClient;
        $this->serializer = $serializer;
        $this->services = [];
    }

    /**
     * @param string $name
     * @return string
     */
    abstract protected function getServiceClass(string $name): string;

    /**
     * @param string $name
     * @return AbstractService
     * @throws \Exception
     */
    public function __get(string $name): AbstractService
    {
        if (!isset($this->services[$name])) {
            $serviceClass = $this->getServiceClass($name);
            if (empty($serviceClass) || !class_exists($serviceClass)) {
                throw new \Exception(sprintf("Unknown service '%s'", $name));
            }
            $this->services[$name] = new $serviceClass($this->apiClient, $this->serializer);
        }

        return $this->services[$name];
    }
}
