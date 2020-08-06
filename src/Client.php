<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use Autoeuro\Api\Service\ServiceFactory;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class Client
{
    /** @var ClientInterface */
    private $httpClient;

    /** @var RequestFactoryInterface */
    private $requestFactory;

    /** @var ServiceFactory */
    private $serviceFactory;

    public function __construct(ClientInterface $httpClient = null, RequestFactoryInterface $requestFactory = null)
    {
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $this->serviceFactory = new ServiceFactory($this);
    }

    /**
     * @param $name
     * @return Service\AbstractService
     * @throws \Exception
     */
    public function __get($name)
    {
        return $this->serviceFactory->__get($name);
    }
}