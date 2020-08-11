<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class Brand extends ApiResponse
{
    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $maker;

}