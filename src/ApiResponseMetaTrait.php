<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

trait ApiResponseMetaTrait
{
    /**
     * @var Meta
     * @Annotation\Type("Autoeuro\Api\Meta")
     * @Annotation\SerializedName("META")
     */
    protected $meta;
}