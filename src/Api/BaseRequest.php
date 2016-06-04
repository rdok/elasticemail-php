<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\Api;

use GuzzleHttp\Client;

abstract class BaseRequest
{
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
            'base_uri' => $this->baseUrlV2,
        ]);
    }

    public function setConfig(array $config)
    {
        if (!isset($config['apikey'])) {
            throw new \Exception('Missing required parameter: apikey');
        }

        $this->config['apikey'] = $config['apikey'];
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