<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\ApiResponseMetaTrait;
use Autoeuro\Api\BrandResponse;

class BrandService extends AbstractService
{
    use ApiResponseMetaTrait;

    /**
     * @return BrandResponse
     */
    public function all(): BrandResponse
    {
        $result = $this->request('get', '/shop/brands');
        return $this->serializer->deserialize($result->getBody()->getContents(), BrandResponse::class, 'json');
    }

}