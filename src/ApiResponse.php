<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

abstract class ApiResponse
{
    /**
     * @var array
     * @Annotation\Type("array")
     * @Annotation\SerializedName("ERROR")
     */
    protected $error;

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $methodName = 'get' . ucfirst($name);
        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        }
        if (property_exists(self::class, $name)) {
            return $this->{$name};
        }

        return null;
    }

}