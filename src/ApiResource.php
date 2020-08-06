<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

abstract class ApiResource
{

    /**
     * @var array
     * @Annotation\Type("array")
     * @Annotation\SerializedName("META")
     */
    protected $meta;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Annotation\SerializedName("DATA")
     */
    protected $data;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Annotation\SerializedName("ERROR")
     */
    protected $error;

}