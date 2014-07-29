<?php

namespace Clarity\WebMoneyBundle\Client\Command;

use Guzzle\Service\Command\OperationCommand;
use Misd\GuzzleBundle\Service\Command\JMSSerializerAwareCommandInterface;
use JMS\Serializer\SerializerInterface;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
abstract class AbstractDeserializeCommand extends OperationCommand implements JMSSerializerAwareCommandInterface
{
    public $serializer;

    /**
     * @param \JMS\Serializer\SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
}
