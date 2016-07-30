<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */

namespace Src;

use Src\Exceptions\ElasticEmailV2Exception;
use Src\V2\Email\EmailRequest;

class ElasticEmailV2
{
    const BASE_URI_KEY = 'base_uri';
    const API_KEY = 'apikey';
    protected $baseUrlV2 = 'https://api.elasticemail.com/v2/';
    /**
     * @var array
     */
    private $config;
    /**
     * @var EmailRequest
     */
    private $emailRequest;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param array $config
     * @throws ElasticEmailV2Exception
     */
    public function setConfig($config)
    {
        if (!array_key_exists(self::BASE_URI_KEY, $config)) {
            throw new ElasticEmailV2Exception('Missing base uri.');
        }

        if (!array_key_exists(self::API_KEY, $config)) {
            throw new ElasticEmailV2Exception('Missing API key.');
        }

        $this->config[self::BASE_URI_KEY] = $this->baseUrlV2;
    }

    /**
     * @return EmailRequest
     */
    public function email()
    {
        if (is_null($this->emailRequest)) {
            $this->emailRequest = new EmailRequest($this->config);
        }

        return $this->emailRequest;
    }
}