<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\CartDeleteResponse;
use Autoeuro\Api\CartProductsResponse;
use Autoeuro\Api\Delivery;
use Autoeuro\Api\OrderCreateByCartResponse;
use Autoeuro\Api\Product;
use Autoeuro\Api\SearchProduct;
use Autoeuro\Api\Subdivision;

class CartService extends AbstractService
{

    /**
     * @return CartProductsResponse
     */
    public function all(): CartProductsResponse
    {
        $response = $this->request('get', '/shop/basket_items');
        return $this->serializer->deserialize($response->getBody()->getContents(), CartProductsResponse::class, 'json');
    }

    /**
     * @param string $orderKey
     * @param int $quantity
     * @param string|null $note
     *
     * @return CartProductsResponse
     */
    public function add(string $orderKey, int $quantity, string $note = null): CartProductsResponse
    {
        $params = [
            'order_key' => $orderKey,
            'quantity'  => $quantity,
            'item_note' => $note ?? '',
        ];
        $response = $this->request('post', '/shop/basket_put', $params);
        return $this->serializer->deserialize($response->getBody()->getContents(), CartProductsResponse::class, 'json');
    }

    /**
     * @param string $itemKey
     *
     * @return CartDeleteResponse
     */
    public function delete(string $itemKey): CartDeleteResponse
    {
        $response = $this->request('post', '/shop/basket_del', [
            'basket_item_key' => $itemKey,
        ]);
        return $this->serializer->deserialize($response->getBody()->getContents(), CartDeleteResponse::class, 'json');
    }



}