<?php

namespace Tests\Integration\Email;

use Dotenv\Dotenv;
use ElasticEmail\Client;
use ElasticEmail\Email\Send;
use Tests\Integration\IntegrationTestCase;

class SendTest extends IntegrationTestCase
{
    /** @test */
    public function send_an_email()
    {
        $this->loadEnv();
        $client = new Client($_ENV['ELASTIC_EMAIL_API_KEY']);
        $send = new Send($client);

        $subject = "elasticemail-php: Integration test ensuring email send.";
        $response = $send->handle([
            'to' => $_ENV['INTEGRATION_TEST_EMAIL_TO'],
            'from' => $_ENV['INTEGRATION_TEST_EMAIL_FROM'],
            'subject' => $subject,
        ]);

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
