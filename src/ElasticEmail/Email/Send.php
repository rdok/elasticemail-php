<?php

namespace ElasticEmail\Email;

use ElasticEmail\ElasticEmailClient;

/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */
class Send
{
    /** @var ElasticEmailClient */
    private $client;

    public function __construct(ElasticEmailClient $client)
    {
        $this->client = $client;
    }

    public function handle()
    {
        $this->response = $this->client->request(
            'POST',
            'email/send'
        );

        return $this;
    }
}