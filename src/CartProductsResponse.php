<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class CartProductsResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var array<CartProduct>
     * @Annotation\Type("array<Autoeuro\Api\CartProduct>")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;

}