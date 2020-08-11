<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class DeliveryResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var array<Delivery>
     * @Annotation\Type("array<Autoeuro\Api\Delivery>")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;
}