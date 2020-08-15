<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class OrderItemCreateResult extends ApiResponse
{

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("order_key")
     */
    protected $orderKey;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("result_message")
     */
    protected $message;

}