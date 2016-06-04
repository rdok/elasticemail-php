<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response as Psr7Response;

abstract class BaseResponse
{
    /**
     * @var Client
     */
    protected $httpClient;
    protected $response;

    public function __construct(Psr7Response $client)
    {
        $this->httpClient = $client;

        $this->response = json_decode($client->getBody()->getContents());

        if (!$this->wasSuccessful()) {
            throw new \Exception('Missing required parameter - apikey');
        }
    }

    /**
     * The API status response of the requested action.
     *
     * @return bool
     */
    public function wasSuccessful()
    {
        return $this->response->success;
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

    /**
     * The API error message response of the requested action.
     *
     * @return bool
     */
    public function getErrorMessage()
    {
        return $this->response->error;
    }

    /**
     * The API data response.
     *
     * @return bool
     */
    public function getData()
    {
        return 'a';
    }
}