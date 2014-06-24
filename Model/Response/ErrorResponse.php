<?php

namespace Clarity\WebMoneyBundle\Model\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class ErrorResponse
{
    /**
     * @Serializer\Type("array<string, string>")
     *
     * @var array
     */
    private $error;

    /**
     * @return bool
     */
    public function hasError()
    {
        return is_array($this->error) ? true : false;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return isset($this->error['type']) ? $this->error['type'] : '';
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return isset($this->error['message']) ? $this->error['message'] : '';
    }

    /**
     * @param string $type
     * @param string $message
     * @return \FundingWonder\BancBoxBundle\Model\Response\BaseResponse
     */
    public function setError($type, $message)
    {
        $this->error['type'] = $type;
        $this->error['message'] = $message;

        return $this;
    }
}
