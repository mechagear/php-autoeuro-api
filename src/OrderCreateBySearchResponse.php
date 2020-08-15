<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class OrderCreateBySearchResponse
 * @package Autoeuro\Api
 *
 * @property OrderItemsCreateResult $result
 */
class OrderCreateBySearchResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var OrderItemsCreateResult
     * @Annotation\Type("Autoeuro\Api\OrderItemsCreateResult")
     * @Annotation\SerializedName("DATA")
     */
    protected $result;

}
