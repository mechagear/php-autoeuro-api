<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;


use Autoeuro\Api\CartProduct;
use Autoeuro\Api\Delivery;
use Autoeuro\Api\OrderCreateByCartResponse;
use Autoeuro\Api\OrderCreateBySearchResponse;
use Autoeuro\Api\SearchProduct;
use Autoeuro\Api\Subdivision;

class OrderService extends AbstractService
{

    /**
     * @param Delivery $delivery
     * @param Subdivision $subdivision
     * @param array<CartProduct> $items
     * @param bool|null $waitAllGoods
     * @param string|null $comment
     *
     * @return OrderCreateByCartResponse
     */
    public function orderByCart(Delivery $delivery, Subdivision $subdivision, array $items, bool $waitAllGoods = null, string $comment = null): OrderCreateByCartResponse
    {
        $waitAllGoods = $waitAllGoods ?? true;

        $itemKeys = array_filter(array_map(function ($item) {
            return ($item instanceof CartProduct) ? $item->itemKey : $item;
        }, $items), 'is_string');

        $params = [
            'delivery_key' => $delivery->key,
            'subdivision_key' => $subdivision->key,
            'wait_all_goods' => (int) $waitAllGoods,
            'comment' => $comment ?? '',
            'basket_item_keys' => $itemKeys,
        ];
        $response = $this->request('post', '/shop/order_basket', $params);
        return $this->serializer->deserialize($response->getBody()->getContents(), OrderCreateByCartResponse::class, 'json');
    }

    /**
     * @param Delivery $delivery
     * @param Subdivision $subdivision
     * @param array $items
     * @param bool|null $waitAllGoods
     * @param string|null $comment
     *
     * @return OrderCreateBySearchResponse
     */
    public function orderBySearch(Delivery $delivery, Subdivision $subdivision, array $items, bool $waitAllGoods = null, string $comment = null): OrderCreateBySearchResponse
    {
        $waitAllGoods = $waitAllGoods ?? true;

        $itemKeys = array_filter(array_map(function ($item) {
            return ($item instanceof SearchProduct) ? [
                'order_key' => $item->orderKey,
                'quantity' => 1,
            ] : $item;
        }, $items), function ($item) {
            return is_array($item) && [] == array_diff(['order_key', 'quantity'], array_keys($item));
        });

        $params = [
            'delivery_key' => $delivery->key,
            'subdivision_key' => $subdivision->key,
            'wait_all_goods' => (int) $waitAllGoods,
            'comment' => $comment ?? '',
            'stock_items' => $itemKeys,
        ];

        $response = $this->request('post', '/shop/order_stock', $params);
        return $this->serializer->deserialize($response->getBody()->getContents(), OrderCreateBySearchResponse::class, 'json');
    }

}