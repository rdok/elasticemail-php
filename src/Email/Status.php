<?php

namespace ElasticEmail\Email;

use ElasticEmail\Client;
use ElasticEmail\Response;

class Status extends Response
{
    const URI = 'email/status';

    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function request(string $messageID)
    {
        $options = ['query' => ['messageID' => $messageID]];

        $this->response = $this->client->request('POST', self::URI, $options);

        return $this;
    }
}
