<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class OrderedProduct
 * @package Autoeuro\Api
 *
 * @property string $orderNumber
 */
class OrderedProduct extends Product
{

    /**
     * @var int
     * @Annotation\Type("int")
     */
    protected $amount;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("tovar_state")
     */
    protected $state;

    /**
     * @var \DateTimeImmutable
     * @Annotation\Type("DateTimeImmutable<'Y-m-d H:i:s'>")
     * @Annotation\SerializedName("order_date")
     */
    protected $orderDate;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("order_number")
     */
    protected $orderNumber;

}