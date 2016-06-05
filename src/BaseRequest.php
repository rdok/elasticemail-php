<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src;

use GuzzleHttp\Client;

abstract class BaseRequest
{
    const BASE_URI = 'base_uri';

    protected $baseUrlV2 = 'https://api.elasticemail.com/v2/';

    /**
     * @var Client
     */
    protected $httpClient;
    /**
     * @var array
     */
    protected $config;

    public function __construct(array $config)
    {
        $this->setConfig($config);

        $this->httpClient = new Client([
            self::BASE_URI => $this->config[self::BASE_URI],
        ]);
    }

    public function setConfig(array $config)
    {
        if (!isset($config['apikey'])) {
            throw new \Exception('Missing required parameter: apikey');
        }

        if (!isset($config[self::BASE_URI])) {
            throw new \Exception('Missing required parameter: base_uri');
        }

        $this->config = $config;
    }

    /**
     * Get the HTTP status code.
     *
     * @return mixed
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }
}