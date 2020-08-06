<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\Brand;

class BrandService extends AbstractService
{

    public function all()
    {
        $result = $this->request('get', '/shop/brands');
        $objects = $this->serializer->deserialize($result->getBody()->getContents(), Brand::class, 'json');
        return $objects;
    }

}