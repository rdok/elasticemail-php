<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\Api\V2\Responses;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response as Psr7Response;
use Src\Api\Response;

class SendResponse implements Response
{
    /**
     * @var Client
     */
    protected $httpClient;

    public function __construct(Psr7Response $client)
    {
        $this->httpClient = $client;
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

    public function getTransactionId()
    {
        return 'test';
    }

    /**
     * The API status response of the requested action.
     *
     * @return bool
     */
    public function wasSuccessful()
    {
        return true;
    }

    /**
     * The API error message response of the requested action.
     *
     * @return bool
     */
    public function getErrorMessage()
    {
        // TODO: Implement getErrorMessage() method.
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