<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class ProductVariant extends ApiResponse
{
    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $code;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $brand;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $name;

}