<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class CartDeleteResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var CartDeleteResult
     * @Annotation\Type("Autoeuro\Api\CartDeleteResult")
     * @Annotation\SerializedName("DATA")
     */
    protected $result;
}