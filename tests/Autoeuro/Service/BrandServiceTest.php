<?php
declare(strict_types=1);

namespace Autoeuro\Service;

use Autoeuro\Api\Brand;
use Autoeuro\Api\BrandResponse;
use Autoeuro\Api\Service\BrandService;
use GuzzleHttp\Psr7\Response;

class BrandServiceTest extends AbstractServiceTest
{

    public function testAll()
    {
        $apiClient = $this->getApiClientMock();
        $validResponse = new Response(200, [], json_encode([
            "META" => [],
            "DATA" => [
                [
                    'maker' => 'Lada',
                ]
            ],
        ]));
        $apiClient->method('request')->willReturn($validResponse);
        $service = new BrandService($apiClient, $this->getSerializer());
        $result = $service->all();

        $this->assertInstanceOf(BrandResponse::class, $result);
        $this->assertObjectHasAttribute('items', $result);
        $this->assertIsArray($result->items);
        $this->assertCount(1, $result->items);
        $this->assertArrayHasKey(0, $result->items);
        $this->assertInstanceOf(Brand::class, $result->items[0]);
        $this->assertEquals('Lada', $result->items[0]->maker);
    }

}