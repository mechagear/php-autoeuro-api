<?php
declare(strict_types=1);

namespace Autoeuro\Service;

use Autoeuro\Api\Balance;
use Autoeuro\Api\BalanceResponse;
use Autoeuro\Api\Service\BalanceService;
use GuzzleHttp\Psr7\Response;

class BalanceServiceTest extends AbstractServiceTest
{

    public function testAll()
    {
        $apiClient = $this->getApiClientMock();
        $validResponse = new Response(200, [], json_encode([
            "META" => [],
            "DATA" => [
                [
                    'balance' => 1,
                    'credit' => 1,
                ]
            ],
        ]));
        $apiClient->method('request')->willReturn($validResponse);
        $service = new BalanceService($apiClient, $this->getSerializer());
        $result = $service->all();

        $this->assertInstanceOf(BalanceResponse::class, $result);
        $this->assertObjectHasAttribute('items', $result);
        $this->assertIsArray($result->items);
        $this->assertCount(1, $result->items);
        $this->assertInstanceOf(Balance::class, $result->items[0]);
    }
}