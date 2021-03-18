<?php

namespace ElasticEmail\Email;

use ElasticEmail\Client;

/**
 * Access to Email API end points.
 * @see http://api.elasticemail.com/public/help#Email_header
 */
class Email
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send(array $params = [], $attachmentPaths = []): Send
    {
        $send = new Send($this->client);

        return $send->handle($params, $attachmentPaths);
    }

    public function status()
    {
        return new Status($this->client);
    }
}
