<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class OrderCreateResult
 * @package Autoeuro\Api
 *
 * @property int $orderNumber
 */
class OrderCreateResult extends ApiResponse
{
    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("order_number")
     */
    protected $orderNumber;

}