<?php

namespace Clarity\WebMoneyBundle\Model\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class WebMoneyOperation
{
    /**
     * @Serializer\SerializedName("tranid")
     * @Serializer\Type("integer")
     *
     * @var integer
     */
    private $transferId;

    /**
     * @Serializer\SerializedName("pursesrc")
     * @Serializer\Type("string")
     *
     * @var integer
     */
    private $sourcePurse;

    /**
     * @Serializer\SerializedName("pursedest")
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $destPurse;

    /**
     * @Serializer\SerializedName("amount")
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $amount;

    /**
     * @Serializer\SerializedName("comiss")
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $commission;

    /**
     * @Serializer\SerializedName("opertype")
     * @Serializer\Type("integer")
     *
     * @var integer
     */
    private $type;

    /**
     * @Serializer\SerializedName("period")
     * @Serializer\Type("integer")
     *
     * @var integer
     */
    private $protectionPeriod;

    /**
     * @Serializer\SerializedName("wminvid")
     * @Serializer\Type("integer")
     *
     * @var integer
     */
    private $invId;

    /**
     * @Serializer\SerializedName("orderid")
     * @Serializer\Type("integer")
     *
     * @var integer
     */
    private $orderId;

    /**
     * @Serializer\SerializedName("desc")
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $description;

    /**
     * @Serializer\SerializedName("datecrt")
     * @Serializer\Type("DateTime")
     *
     * @var \DateTime
     */
    private $created;

    /**
     * @Serializer\SerializedName("dateupd")
     * @Serializer\Type("DateTime")
     *
     * @var \DateTime
     */
    private $updated;

    /**
     * Gets the value of transferId.
     *
     * @return integer
     */
    public function getTransferId()
    {
        return $this->transferId;
    }

    /**
     * Gets the value of sourcePurse.
     *
     * @return integer
     */
    public function getSourcePurse()
    {
        return $this->sourcePurse;
    }

    /**
     * Gets the value of destPurse.
     *
     * @return string
     */
    public function getDestPurse()
    {
        return $this->destPurse;
    }

    /**
     * Gets the value of amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Gets the value of commission.
     *
     * @return float
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Gets the value of type.
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Gets the value of protectionPeriod.
     *
     * @return integer
     */
    public function getProtectionPeriod()
    {
        return $this->protectionPeriod;
    }

    /**
     * Gets the value of invId.
     *
     * @return integer
     */
    public function getInvId()
    {
        return $this->invId;
    }

    /**
     * Gets the value of orderId.
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Gets the value of created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Gets the value of updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
