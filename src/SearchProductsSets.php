<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class SearchProductsSets
 * @package Autoeuro\Api
 *
 * @property array<ProductVariant> $variants
 * @property array<SearchProduct> $codes
 * @property array<SearchProduct> $crosses
 */
class SearchProductsSets extends ApiResponse
{
    /**
     * @var array<ProductVariant>
     * @Annotation\Type("array<Autoeuro\Api\ProductVariant>")
     * @Annotation\SerializedName("VARIANTS")
     */
    protected $variants;

    /**
     * @var array<SearchProduct>
     * @Annotation\Type("array<Autoeuro\Api\SearchProduct>")
     * @Annotation\SerializedName("CODES")
     */
    protected $codes;

    /**
     * @var array<SearchProduct>
     * @Annotation\Type("array<Autoeuro\Api\SearchProduct>")
     * @Annotation\SerializedName("CROSSES")
     */
    protected $crosses;
}