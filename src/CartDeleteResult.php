<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class CartDeleteResult extends ApiResponse
{
    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("deleted_count")
     */
    protected $deleted;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("basket_count")
     */
    protected $remaining;

}