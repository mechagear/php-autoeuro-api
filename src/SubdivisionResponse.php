<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class SubdivisionResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var array<Subdivision>
     * @Annotation\Type("array<Autoeuro\Api\Subdivision>")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;

}