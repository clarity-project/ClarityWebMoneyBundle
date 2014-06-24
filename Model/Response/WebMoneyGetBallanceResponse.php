<?php

namespace Clarity\WebMoneyBundle\Model\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class WebMoneyGetBallanceResponse extends WebMoneyBaseResponse
{
    /**
     * @Serializer\SerializedName("purses")
     * @Serializer\Type("array<Clarity\WebMoneyBundle\Model\Response\WebMoneyPurse>")
     *
     * @var string
     */
    private $purses;

    /**
     * Gets the value of purses.
     *
     * @return array
     */
    public function getPurses()
    {
        return $this->purses;
    }
}
