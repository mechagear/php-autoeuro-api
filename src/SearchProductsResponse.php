<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class SearchProductsResponse
 * @package Autoeuro\Api
 *
 * @property SearchProductsSets $items
 */
class SearchProductsResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var SearchProductsSets
     * @Annotation\Type("Autoeuro\Api\SearchProductsSets")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;

}