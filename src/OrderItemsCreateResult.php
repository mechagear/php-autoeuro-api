<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class OrderItemsCreateResult extends ApiResponse
{

    /**
     * @var array<OrderItemCreateResult>
     * @Annotation\Type("array<Autoeuro\Api\OrderItemCreateResult>")
     * @Annotation\SerializedName("SUCCESS")
     */
    protected $success;

    /**
     * @var array<OrderItemCreateResult>
     * @Annotation\Type("array<Autoeuro\Api\OrderItemCreateResult>")
     * @Annotation\SerializedName("ERRORS")
     */
    protected $errors;

}