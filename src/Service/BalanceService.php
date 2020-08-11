<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;


use Autoeuro\Api\BalanceResponse;

class BalanceService extends AbstractService
{

    /**
     * @return BalanceResponse
     */
    public function all(): BalanceResponse
    {
        $response = $this->request('get', '/shop/balance');
        return $this->serializer->deserialize($response->getBody()->getContents(), BalanceResponse::class, 'json');
    }

}