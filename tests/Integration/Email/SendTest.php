<?php

namespace Tests\Integration\Email;

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
            'to' => $_ENV['TEST_EMAIL_TO'],
            'from' => $_ENV['TEST_EMAIL_FROM'],
            'subject' => $subject,
            'bodyText' => 'Your mind will answer most questions if you learn '
                . 'to relax and wait for the answer.'
        ]);

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(200, $response->getStatusCode());

        d($response->getBody());
    }
}
