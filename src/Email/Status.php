<?php

namespace ElasticEmail\Email;

use ElasticEmail\Client;
use ElasticEmail\Response;

class Status extends Response
{
    const URI = 'email/send';

    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function request()
    {
        $this->response = $this->client->request('POST', self::URI);

        return $this;
    }
}
