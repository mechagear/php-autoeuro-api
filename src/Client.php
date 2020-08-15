<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use Autoeuro\Api\Service\BalanceService;
use Autoeuro\Api\Service\BrandService;
use Autoeuro\Api\Service\CartService;
use Autoeuro\Api\Service\DeliveryService;
use Autoeuro\Api\Service\OrderService;
use Autoeuro\Api\Service\ProductsService;
use Autoeuro\Api\Service\ServiceFactory;
use Autoeuro\Api\Service\SubdivisionService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Autoeuro\Api\ClientInterface as BaseClientInterface;

/**
 * Class Client
 * @package Autoeuro\Api
 *
 * @property BrandService $brands
 * @property SubdivisionService $subdivisions
 * @property DeliveryService $deliveries
 * @property BalanceService $balance
 * @property ProductsService $products
 * @property CartService $cart
 * @property OrderService $order
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
        $request = $this->requestFactory->createRequest($method, self::BASE_URL . $path . "/json/" . $this->apiKey . '?' . http_build_query($params));
        echo $request->getUri();
        try {
            return $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            echo $e->getMessage();
            throw $e;
        }
    }
}