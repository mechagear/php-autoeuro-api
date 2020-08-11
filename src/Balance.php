<?php
declare(strict_types=1);

namespace Autoeuro\Api;

use JMS\Serializer\Annotation;

class Balance extends ApiResponse
{

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $balance;

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $credit;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("ordered_total")
     */
    protected $orderedTotal;

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $ordered;

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $reserved;

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $limit;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("pay_tomorrow")
     */
    protected $payTomorrow;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("shipping_from")
     */
    protected $shippingFrom;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("reclamation_new")
     */
    protected $reclamationNew;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("cash_back")
     */
    protected $cashback;

}