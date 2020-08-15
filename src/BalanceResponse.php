<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class BalanceResponse
 * @package Autoeuro\Api
 *
 * @property array<Balance> $items
 */
class BalanceResponse extends ApiResponse
{
    use ApiResponseMetaTrait;

    /**
     * @var array<Balance>
     * @Annotation\Type("array<Autoeuro\Api\Balance>")
     * @Annotation\SerializedName("DATA")
     */
    protected $items;
}