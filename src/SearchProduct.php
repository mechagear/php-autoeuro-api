<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class SearchProduct
 * @package Autoeuro\Api
 *
 * @property string $orderKey
 */
class SearchProduct extends Product
{

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("order_key")
     */
    protected $orderKey;

    /**
     * @var int
     * @Annotation\Type("int")
     */
    protected $packing;

    /**
     * @var int
     * @Annotation\Type("int")
     */
    protected $amount;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("order_term")
     */
    protected $orderTerm;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $proposal;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("from_warehouse_id")
     */
    protected $warehouseId;

}