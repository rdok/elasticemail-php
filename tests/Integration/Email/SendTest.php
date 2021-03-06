<?php

namespace Tests\Integration;

use Dotenv\Dotenv;
use ElasticEmail\Client;
use ElasticEmail\Email\Send;
use Tests\TestCase;

class SendTest extends TestCase
{
    /** @test */
    public function send_an_email()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '../../');
        $dotenv->load();

        $apiKey = getenv('ELASTIC_EMAIL_API_KEY');
        $from = getenv('INTEGRATION_TEST_EMAIL_FROM');
        $to = getenv('INTEGRATION_TEST_EMAIL_TO');

        $client = new Client($apiKey);

        $send = new Send($client);

        $response = $send->handle([
            'to' => $to,
            'from' => $from,
            'subject' => $this->subject(__FUNCTION__),
        ]);

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
