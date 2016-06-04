<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\Api;

use GuzzleHttp\Client;

abstract class BaseRequest
{
    protected $baseUrl = 'https://api.elasticemail.com/v2/';
    /**
     * @var Client
     */
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
        ]);
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