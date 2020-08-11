<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class BrandResponse extends ApiResponse
{
    /**
     * @var array<Brand>
     * @Annotation\Type("array<Autoeuro\Api\Brand>")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;
}