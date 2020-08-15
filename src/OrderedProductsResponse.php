<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class OrderedProductsResponse
 * @package Autoeuro\Api
 *
 * @property array<OrderedProduct> $items
 */
class OrderedProductsResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var array<OrderedProduct>
     * @Annotation\Type("array<Autoeuro\Api\OrderedProduct>")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;

}