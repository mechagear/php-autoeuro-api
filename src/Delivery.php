<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class Delivery
 * @package Autoeuro\Api
 *
 * @property string $key
 */
class Delivery extends ApiResponse
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("delivery_key")
     */
    protected $key;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("delivery_method")
     */
    protected $method;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("delivery_method_id")
     */
    protected $methodId;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("delivery_name")
     */
    protected $name;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("delivery_note")
     */
    protected $note;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("from_warehouse_name")
     */
    protected $warehouseName;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("from_warehouse_id")
     */
    protected $warehouseId;

}
