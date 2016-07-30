<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\V2\Requests;

use GuzzleHttp\Client;

abstract class BaseRequest
{
    const BASE_URI_KEY = 'base_uri';
    const API_KEY = 'apikey';
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
            self::BASE_URI_KEY => $this->config[self::BASE_URI_KEY],
        ]);
    }

    public function setConfig(array $config)
    {
        if (!isset($config[self::API_KEY])) {
            throw new \Exception('Missing required parameter: apikey');
        }

        if (!isset($config[self::BASE_URI_KEY])) {
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