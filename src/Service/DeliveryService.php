<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;


use Autoeuro\Api\DeliveryResponse;

class DeliveryService extends AbstractService
{

    /**
     * @return DeliveryResponse
     */
    public function all(): DeliveryResponse
    {
        $response = $this->request('get', '/shop/deliveries');
        return $this->serializer->deserialize($response->getBody()->getContents(), DeliveryResponse::class, 'json');
    }

}