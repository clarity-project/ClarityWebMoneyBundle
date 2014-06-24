<?php

namespace ZW\ApiBundle\Client\Command;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class WebMoneyDeserializeCommand extends AbstractDeserializeCommand
{
    public function process()
    {
        $this->result = $this->serializer->deserialize(
            $this->request->getResponse()->getBody(true),
            $this->getOperation()->getResponseClass(),
            'xml'
        );
    }
}
