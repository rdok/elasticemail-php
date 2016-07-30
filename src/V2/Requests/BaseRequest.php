<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\V2\Requests;

use GuzzleHttp\Client;
use Src\ElasticEmailV2;
use Src\V2\Requests\Email\RequestException;

abstract class BaseRequest
{
    /**
     * @var Client
     */
    private $httpClient;
    /**
     * @var string
     */
    private $apiKey;

    public function __construct(array $config)
    {
        $baseUri = array_key_exists(
            ElasticEmailV2::BASE_URI_KEY, $config) ? $config[ElasticEmailV2::BASE_URI_KEY] : null;
        $apiKey = array_key_exists(ElasticEmailV2::API_KEY, $config) ? $config[ElasticEmailV2::API_KEY] : null;

        $this->setHttpClient($baseUri);

        $this->setApiKey($apiKey);
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
     * @param $baseUri
     * @throws RequestException
     */
    public function setHttpClient($baseUri)
    {
        if (!filter_var($baseUri, FILTER_VALIDATE_URL)) {
            throw new RequestException('Invalid base uri.');
        }

        $this->httpClient = new Client(['base_uri' => $baseUri]);
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}