<?php

namespace Tests\Integration\Email;

use ElasticEmail\ElasticEmail;
use Tests\Integration\IntegrationTestCase;

class SendTest extends IntegrationTestCase
{
    /** @test */
    public function send_an_email()
    {
        $this->loadEnv();
        $subject = "elasticemail-php: Integration test ensuring email send.";

        $elasticEmail = new ElasticEmail($_ENV['ELASTIC_EMAIL_API_KEY']);
        $response = $elasticEmail->email()->send([
            'to' => $_ENV['TEST_EMAIL_TO'],
            'from' => $_ENV['TEST_EMAIL_FROM'],
            'subject' => $subject,
            'bodyText' => 'Your mind will answer most questions if you learn '
                . 'to relax and wait for the answer.',
        ]);

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(200, $response->getStatusCode());

        d($response->getBody());
    }

    /** @test */
    public function send_an_email_with_attachment()
    {
        $this->loadEnv();
        $subject = "elasticemail-php: Integration test: validate email "
            . "attachment send.";
        $attachments = [
            __DIR__ . '/alpha-attachment.txt',
             __DIR__ . '/beta-attachment.txt'
        ];

        $elasticEmail = new ElasticEmail($_ENV['ELASTIC_EMAIL_API_KEY']);
        $response = $elasticEmail->email()->send([
            'to' => $_ENV['TEST_EMAIL_TO'],
            'from' => $_ENV['TEST_EMAIL_FROM'],
            'subject' => $subject,
            'bodyText' => 'Wake up Samurai!',
            'mergeSourceFilename' => 'a',
        ], $attachments);

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(200, $response->getStatusCode());

        d($response->getBody());
    }
}
