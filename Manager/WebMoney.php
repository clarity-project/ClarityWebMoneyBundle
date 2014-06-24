<?php

namespace Clarity\WebMoneyBundle\Manager;

use Guzzle\Service\ClientInterface;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class WebMoney extends AbstractManager
{
    /**
     * @var string
     */
    private $wmId;

    /**
     * @var string
     */
    private $wmR;

    /**
     * @var string
     */
    private $wmSignerPath;

    /**
     * @param \Guzzle\Service\ClientInterface $client
     * @param string $wmId - webmoney id
     * @param string $wmR - webmoney rubels purse
     * @param string $wmSignerPath
     */
    public function __construct(ClientInterface $client, $wmId, $wmR, $wmSignerPath)
    {
        parent::__construct($client);

        $this->wmId = $wmId;
        $this->wmR = $wmR;
        $this->wmSignerPath = $wmSignerPath;
    }

    /**
     * Transfer monet via xml X2 interface
     *
     * @param integer $transactionId - unique id in system
     * @param string $purseDest - wm purse destination
     * @param string $amount - float amount of transfer
     * @param integer $period - protection period (0 - without protection)
     * @param string $protectionCode - code of protection less than 255 symols without spaces in end and begin (if period = 0 should be empty string '')
     * @param string $description - notes for transfer less than 255 symols without spaces in end and begin
     * @param integer $wmInvId - number of web money account (0 - if transfer not by account)
     * @param boolean $onlyAuth (should be 1)
     *
     * @return 
     */
    public function transfer(
        $transactionId,
        $purseDest,
        $amount,
        $period = 0,
        $protectionCode = '',
        $description = '',
        $wmInvId = 0,
        $onlyAuth = 1
    ) {
        $requestNumber = $this->getRequestNumber();

        $description = trim($description);
        $protectionCode = trim($protectionCode);
        $amount = (float) $amount;

        $sign = $this->getRequestSign(
            implode(array(
                $requestNumber,
                $transactionId,
                $this->wmR,
                $purseDest,
                $amount,
                $period,
                $protectionCode,
                $description,
                $wmInvId,
                $onlyAuth,
            ))
        );

        $protectionCode = htmlspecialchars($protectionCode, ENT_QUOTES);
        $description = htmlspecialchars($description, ENT_QUOTES);
        $protectionCode = iconv("CP1251", "UTF-8", $protectionCode);
        $description = iconv("CP1251", "UTF-8", $description);

        return $this->call('X2_transfer', array(
            'reqn' => $requestNumber,
            'wmid' => $this->wmId,
            'sign' => $sign,
            'trans' => array(
                'tranid' => $transactionId,
                'pursesrc' => $this->wmR,
                'pursedest' => $purseDest,
                'amount' => $amount,
                'period' => $period,
                'pcode' => $protectionCode,
                'desc' => $description,
                'wminvid' => $wmInvId,
                'onlyauth' => $onlyAuth,
            )
        ));
    }

    public function getPurseBallance()
    {
        $requestNumber = $this->getRequestNumber();

        $sign = $this->getRequestSign(
            implode(array(
                $this->wmId,
                $requestNumber,
            ))
        );

        return $this->call('X6_current_ballance', array(
            'reqn' => $requestNumber,
            'wmid' => $this->wmId,
            'sign' => $sign,
            'getpurses' => array(
                'wmid' => $this->wmId,
            )
        ));
    }

    /**
     * Generate unique 15 numbers string
     * @return string
     */
    function getRequestNumber()
    {
        $time = microtime();
        $int = substr($time, 11);
        $flo = substr($time, 2, 5);

        return $int . $flo;
    }

    /**
     * Generate request wign with wmsigner tool
     * @param string $inputString
     * @return string
     */
    function getRequestSign($inputString)
    {
        // global $Path_Folder, $Path_Signer;
        chdir($this->wmSignerPath);

        $descriptorspec = array(
            0 => array('pipe', 'r'),
            1 => array('pipe', 'w'),
            2 => array('pipe', 'r')
        );

        $process = proc_open(
            $this->wmSignerPath . 'wmsigner',
            $descriptorspec,
            $pipes
        );

        fwrite($pipes[0], "$inputString\004\r\n");
        fclose($pipes[0]);

        $outputString = fgets($pipes[1], 133);
        fclose($pipes[1]);

        $return_value = proc_close($process);

        return $outputString;
    }
}
