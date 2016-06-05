<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */

namespace Src\V2;

use Src\BaseRequest;
use Src\V2;
use Src\V2\Email\Send\SendRequest;

class ElasticEmailV2
{
    protected $baseUrlV2 = 'https://api.elasticemail.com/v2/';

    /**
     * @var array
     */
    private $config;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->config = $config;

        $this->config[BaseRequest::BASE_URI] = $this->baseUrlV2;
    }

    /**
     * @return SendRequest
     */
    public function email()
    {
        return new SendRequest($this->config);
    }
}