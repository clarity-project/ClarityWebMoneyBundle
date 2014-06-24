<?php

namespace Clarity\WebMoneyBundle\Model\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class WebMoneyTransferResponse extends WebMoneyBaseResponse
{
    /**
     * @Serializer\SerializedName("operation")
     * @Serializer\Type("Clarity\WebMoneyBundle\Model\Response\WebMoneyOperation")
     *
     * @var string
     */
    private $operation;

    /**
     * Gets the value of operation.
     *
     * @return string
     */
    public function getOperation()
    {
        return $this->operation;
    }
}
