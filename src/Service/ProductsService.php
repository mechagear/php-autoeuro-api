<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\OrderedProductsResponse;
use Autoeuro\Api\SearchProductsResponse;

class ProductsService extends AbstractService
{

    /**
     * @param string $code
     * @param string|null $brand
     * @param bool|null $withCrosses
     *
     * @return SearchProductsResponse
     */
    public function find(string $code, string $brand = null, bool $withCrosses = null): SearchProductsResponse
    {
        $params = [
            'code' => $code,
            'with_crosses' => $withCrosses ? 1 : 0,
        ];
        if (!is_null($brand)) {
            $params['brand'] = $brand;
        }
        $response = $this->request('get', '/shop/stock_items', $params);
        return $this->serializer->deserialize($response->getBody()->getContents(), SearchProductsResponse::class, 'json');
    }

    /**
     * @return OrderedProductsResponse
     */
    public function ordered(): OrderedProductsResponse
    {
        $response = $this->request('get', '/shop/ordered_items');
        return $this->serializer->deserialize($response->getBody()->getContents(), OrderedProductsResponse::class, 'json');
    }

    /**
     * @return OrderedProductsResponse
     */
    public function archived(\DateTimeInterface $dateFrom, \DateTimeInterface $dateTo): OrderedProductsResponse
    {
        $response = $this->request('get', '/shop/archived_items', [
            'date_from' => $dateFrom->format('Y-m-d'),
            'date_to'   => $dateTo->format('Y-m-d'),
        ]);
        return $this->serializer->deserialize($response->getBody()->getContents(), OrderedProductsResponse::class, 'json');
    }

    /**
     * @return OrderedProductsResponse
     */
    public function cancelled(\DateTimeInterface $dateFrom, \DateTimeInterface $dateTo): OrderedProductsResponse
    {
        $response = $this->request('get', '/shop/canceled_items', [
            'date_from' => $dateFrom->format('Y-m-d'),
            'date_to'   => $dateTo->format('Y-m-d'),
        ]);
        return $this->serializer->deserialize($response->getBody()->getContents(), OrderedProductsResponse::class, 'json');
    }

}