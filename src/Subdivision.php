<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/**
 * Class Subdivision
 * @package Autoeuro\Api
 *
 * @property string $key
 */
class Subdivision extends ApiResponse
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("subdivision_key")
     */
    protected $key;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("subdivision_name")
     */
    protected $name;

}