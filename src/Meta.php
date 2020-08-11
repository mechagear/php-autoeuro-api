<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

/*
"META": {
    "result": "DATA",
    "code": 200,
    "results_count": 19,
    "version": "v-1.0",
    "action": "deliveries",
    "format": "json",
    "parameters": [],
    "date_time": "2020-08-11T23:18:55+03:00",
    "user": {
      "id": "80a7bd98-df40-4dda-bd10-13701a242ef2",
      "name": "Тойота",
      "email": "root@toyota-electric.ru"
    },
    "user_id": "80a7bd98-df40-4dda-bd10-13701a242ef2",
    "duration": 0.061
  },
*/


class Meta extends ApiResponse
{
    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $result;

    /**
     * @var int
     * @Annotation\Type("int")
     */
    protected $code;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("results_count")
     */
    protected $resultsCount;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $version;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $action;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $format;

    /**
     * @var array
     * @Annotation\Type("array")
     */
    protected $parameters;

    /**
     * @var \DateTimeImmutable
     * @Annotation\Type("DateTimeImmutable")
     * @Annotation\SerializedName("date_time")
     */
    protected $dateTime;

    /**
     * @var array
     * @Annotation\Type("array")
     */
    protected $user;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("user_id")
     */
    protected $userId;

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $duration;

}