<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class CartProduct
 * @package Autoeuro\Api
 *
 * @property string $itemKey
 */
class CartProduct extends Product
{

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("order_time")
     */
    protected $orderTime;

    /**
     * @var int
     * @Annotation\Type("int")
     */
    protected $packing;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("ordered")
     */
    protected $amount;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("basket_item_key")
     */
    protected $itemKey;

    /**
     * @var array<Delivery>
     * @Annotation\Type("array<Autoeuro\Api\Delivery>")
     */
    protected $deliveries;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("from_warehouse_id")
     */
    protected $warehouseId;


}