<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class BrandResponse
 * @package Autoeuro\Api
 *
 * @property array<Brand> $items
 */
class BrandResponse extends ApiResponse
{
    /**
     * @var array<Brand>
     * @Annotation\Type("array<Autoeuro\Api\Brand>")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;
}