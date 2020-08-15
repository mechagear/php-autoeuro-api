<?php
declare(strict_types=1);

namespace Autoeuro\Service;


use Autoeuro\Api\Brand;
use Autoeuro\Api\BrandResponse;
use Autoeuro\Api\OrderedProduct;
use Autoeuro\Api\OrderedProductsResponse;
use Autoeuro\Api\SearchProduct;
use Autoeuro\Api\SearchProductsResponse;
use Autoeuro\Api\SearchProductsSets;
use Autoeuro\Api\Service\ProductsService;
use GuzzleHttp\Psr7\Response;

class ProductsServiceTest extends AbstractServiceTest
{

    public function testFind()
    {
        $apiClient = $this->getApiClientMock();
        $validResponse = new Response(200, [], json_encode([
            "META" => [],
            "DATA" => [
                'CODES' => [
                    [
                        'order_key' => 'ORDER_KEY',
                        'price'     => 100.5,
                        'name'      => 'TEST PRODUCT',
                    ],
                ],
                'CROSSES' => [],
                'VARIANTS' => [],
            ],
        ]));
        $apiClient->method('request')->willReturn($validResponse);
        $service = new ProductsService($apiClient, $this->getSerializer());
        $result = $service->find('CODE', 'Lada');

        $this->assertInstanceOf(SearchProductsResponse::class, $result);
        $this->assertObjectHasAttribute('items', $result);
        $this->assertInstanceOf(SearchProductsSets::class, $result->items);
        $this->assertObjectHasAttribute('codes', $result->items);
        $this->assertIsArray($result->items->codes);
        $this->assertCount(1, $result->items->codes);
        $this->assertArrayHasKey(0, $result->items->codes);
        $this->assertInstanceOf(SearchProduct::class, $result->items->codes[0]);
        $this->assertEquals('ORDER_KEY', $result->items->codes[0]->orderKey);
    }

    public function testOrderedArchivedCancelled()
    {
        $apiClient = $this->getApiClientMock();

        $apiClient->method('request')->willReturnCallback(function () {
            return new Response(200, [], json_encode([
                "META" => [],
                "DATA" => [
                    [
                        'code' => 'TEST_PRODUCT',
                    ],
                ],
            ]));
        });
        $service = new ProductsService($apiClient, $this->getSerializer());

        $methods = [
            'ordered' => [],
            'archived' => [new \DateTimeImmutable(), new \DateTimeImmutable()],
            'cancelled' => [new \DateTimeImmutable(), new \DateTimeImmutable()],
        ];

        foreach ($methods as $method => $params) {
            $result = call_user_func_array([$service, $method], $params);

            $this->assertInstanceOf(OrderedProductsResponse::class, $result);
            $this->assertObjectHasAttribute('items', $result);
            $this->assertIsArray($result->items);
            $this->assertCount(1, $result->items);
            $this->assertArrayHasKey(0, $result->items);
            $this->assertInstanceOf(OrderedProduct::class, $result->items[0]);
            $this->assertEquals('TEST_PRODUCT', $result->items[0]->code);
        }
    }

}