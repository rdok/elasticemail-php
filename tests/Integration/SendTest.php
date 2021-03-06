<?php

namespace Tests\Integration;

use ElasticEmail\Client;
use ElasticEmail\Email\Send;
use Tests\TestCase;

class SendTest extends TestCase
{
    /** @test */
    public function send_an_email()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../');

        $dotenv->load();

        $client = new Client(getenv('ELASTIC_EMAIL_API_KEY'));

        $send = new Send($client);

        $response = $send->handle([
            'to' => 'mail@gmail.com',
            'from' => 'mail@gmail.com',
            'subject' => subject(__FUNCTION__),
        ]);

        $this->assertTrue($response->wasSuccessful());

        $this->assertEquals(200, $response->getStatusCode());
    }
}
