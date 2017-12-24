<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace ElasticEmail;


trait ClientHelpers
{
    /** @var  \GuzzleHttp\Psr7\Response */
    protected $response;

    public function getResponse()
    {
        return $this->response;
    }

    public function context()
    {
        return $this->getBody()->Context;
    }

    public function getBody()
    {
        return json_decode((string)$this->response->getBody());
    }

    public function wasSuccessful()
    {
        return $this->getBody()->success;
    }

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    public function code()
    {
        return $this->getBody()->Code;
    }

    public function error()
    {
        return $this->getBody()->error;
    }

}