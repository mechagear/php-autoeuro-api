<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class Product extends ApiResponse
{
    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $maker;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $code;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $name;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $unit;

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $price;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $comment;

}