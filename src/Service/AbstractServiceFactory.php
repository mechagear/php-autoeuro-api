<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\ClientInterface;

abstract class AbstractServiceFactory
{
    /** @var ClientInterface */
    private $apiClient;

    /** @var array<string, AbstractService> */
    private $services;

    /**
     * AbstractServiceFactory constructor.
     * @param ClientInterface $apiClient
     */
    public function __construct(ClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
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
            if ( empty($serviceClass) || !class_exists($serviceClass) || !($serviceClass instanceof AbstractService)) {
                throw new \Exception(sprintf("Unknown service '%s'", $name));
            }
            $this->services[$name] = new $serviceClass($this->apiClient);
        }

        return $this->services[$name];
    }
}
