<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use Autoeuro\Api\ApiResource;
use Autoeuro\Api\Service\BrandService;
use Autoeuro\Api\Service\ServiceFactory;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Autoeuro\Api\ClientInterface as BaseClientInterface;

/**
 * Class Client
 * @package Autoeuro\Api
 *
 * @property BrandService $brands
 */
class Client implements BaseClientInterface
{
    const BASE_URL = "https://api.autoeuro.ru/api/v-1.0";

    /** @var string */
    private $apiKey;

    /** @var ClientInterface */
    private $httpClient;

    /** @var RequestFactoryInterface */
    private $requestFactory;

    /** @var ServiceFactory */
    private $serviceFactory;

    private $serializer;

    public function __construct(string $apiKey, ClientInterface $httpClient = null, RequestFactoryInterface $requestFactory = null, SerializerInterface $serializer = null)
    {
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $this->serviceFactory = new ServiceFactory($this, $serializer);
        $this->serializer = $serializer ?? SerializerBuilder::create()->build();
        $this->apiKey = $apiKey;
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

    public function request(string $method, string $path, array $params = null): ResponseInterface
    {
        $params = $params ?? [];
        $request = $this->requestFactory->createRequest($method, self::BASE_URL . $path . "/json/" . $this->apiKey . http_build_query($params));

        try {
            return $this->httpClient->sendRequest($request);
            //return $this->serializer->deserialize($response->getBody()->getContents(), Bran, 'json');
        } catch (ClientExceptionInterface $e) {
            echo $e->getMessage();
            throw $e;
        }
    }

    public function requestCollection()
    {

    }
}