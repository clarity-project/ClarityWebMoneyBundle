<?php

namespace Clarity\WebMoneyBundle\Model\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class WebMoneyPurse
{
    /**
     * @Serializer\SerializedName("pursename")
     * @Serializer\Type("string")
     *
     * @var integer
     */
    private $name;

    /**
     * @Serializer\SerializedName("amount")
     * @Serializer\Type("float")
     *
     * @var integer
     */
    private $amount;

    /**
     * @Serializer\SerializedName("desc")
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $description;

    /**
     * @Serializer\SerializedName("outsideopen")
     * @Serializer\Type("boolean")
     *
     * @var boolean
     */
    private $isOpenOutside;

    /**
     * Gets the value of name.
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the value of amount.
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
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
     * Gets the value of isOpenOutside.
     *
     * @return boolean
     */
    public function getIsOpenOutside()
    {
        return $this->isOpenOutside;
    }
}
