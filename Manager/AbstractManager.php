<?php

namespace Clarity\WebMoneyBundle\Manager;

use Guzzle\Service\ClientInterface;
use Clarity\WebMoneyBundle\Model\Response\ErrorResponse;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
abstract class AbstractManager
{
    /**
     * @var \Guzzle\Service\ClientInterface
     */
    protected $client;

    /**
     * @var \Guzzle\Service\Command\CommandInterface
     */
    protected $command = null;

    /**
     * @param \Guzzle\Service\ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $commandName
     * @param object $requestData
     * @return \ZW\ApiBundle\Model\Response\ErrorResponse|mixed
     */
    protected function call($commandName, $requestData)
    {
        $this->command = $this->client->getCommand(
            $commandName,
            (array) $requestData
        );

        return $this->execute();
    }

    /**
     * Execute request to api
     *
     * @return \ZW\ApiBundle\Model\Response\ErrorResponse|mixed
     * @throws \RuntimeException
     */
    protected function execute()
    {
        if (null === $this->command) {
            throw new \RuntimeException('Guzzle command not initialized');
        }

        try {
            $result = $this->command->execute();
        } catch(\Guzzle\Service\Exception\ValidationException $e) {
            $result = new ErrorResponse();
            $result->setError('VALIDATION-EXCEPTION', print_r($e->getErrors(), true));
        }

        return $result;
    }
}
