<?php

namespace Clarity\WebMoneyBundle\Model\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class WebMoneyBaseResponse
{
    /**
     * @Serializer\SerializedName("reqn")
     * @Serializer\Type("integer")
     *
     * @var integer
     */
    protected $requestNumber;

    /**
     * @Serializer\SerializedName("retval")
     * @Serializer\Type("integer")
     *
     * @var integer
     */
    protected $resultCode;

    /**
     * @Serializer\SerializedName("retdesc")
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $resultDesctiption;

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return 0 === $this->resultCode;
    }

    /**
     * Gets the value of requestNumber.
     *
     * @return integer
     */
    public function getRequestNumber()
    {
        return $this->requestNumber;
    }

    /**
     * Gets the value of resultCode.
     *
     * @return integer
     */
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * Gets the value of resultDesctiption.
     *
     * @return string
     */
    public function getResultDesctiption()
    {
        return $this->resultDesctiption;
    }
}
