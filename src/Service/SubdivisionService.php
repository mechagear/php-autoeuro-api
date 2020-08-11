<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;


use Autoeuro\Api\SubdivisionResponse;

class SubdivisionService extends AbstractService
{

    /**
     * @return SubdivisionResponse
     */
    public function all(): SubdivisionResponse
    {
        $response = $this->request('get', '/shop/subdivisions');
        return $this->serializer->deserialize($response->getBody()->getContents(), SubdivisionResponse::class, 'json');
    }

}