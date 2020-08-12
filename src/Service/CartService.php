<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

use Autoeuro\Api\CartDeleteResponse;
use Autoeuro\Api\CartProductsResponse;
use Autoeuro\Api\Delivery;
use Autoeuro\Api\OrderCreateResponse;
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

    /**
     * @param Delivery $delivery
     * @param Subdivision $subdivision
     * @param array<SearchProduct> $items
     * @param bool|null $waitAllGoods
     * @param string|null $comment
     *
     * @return OrderCreateResponse
     */
    public function order(Delivery $delivery, Subdivision $subdivision, array $items, bool $waitAllGoods = null, string $comment = null): OrderCreateResponse
    {
        $waitAllGoods = $waitAllGoods ?? true;

        $itemKeys = array_map(function (SearchProduct $item) {
            return $item->orderKey;
        }, array_filter($items, function ($item) {
            return ($item instanceof SearchProduct);
        }));

        $params = [
            'delivery_key' => $delivery->key,
            'subdivision_key' => $subdivision->key,
            'wait_all_goods' => (int) $waitAllGoods,
            'comment' => $comment ?? '',
            'basket_item_keys' => $itemKeys,
        ];
        $response = $this->request('post', '/shop/order_basket', $params);
        return $this->serializer->deserialize($response->getBody()->getContents(), OrderCreateResponse::class, 'json');
    }

}