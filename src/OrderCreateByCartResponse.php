<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class OrderCreateResponse
 * @package Autoeuro\Api
 *
 * @property OrderCreateResult $result
 */
class OrderCreateByCartResponse extends ApiResponse
{

    /**
     * @var OrderCreateResult
     * @Annotation\Type("Autoeuro\Api\OrderCreateResult")
     * @Annotation\SerializedName("DATA")
     */
    protected $result;

}