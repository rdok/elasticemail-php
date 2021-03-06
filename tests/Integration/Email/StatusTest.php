<?php

namespace Tests\Integration\Email;

use ElasticEmail\ElasticEmail;
use Tests\Integration\IntegrationTestCase;

class StatusTest extends IntegrationTestCase
{
    /** @test */
    public function check_status_of_an_email()
    {
        $this->loadEnv();

        $elasticEmail = new ElasticEmail($_ENV['ELASTIC_EMAIL_API_KEY']);
        $response = $elasticEmail->email()->status()
            ->request('l7gX4coU6sCb7YWTLC9H-w2');

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(200, $response->getStatusCode());

        d($response->getBody());
    }
}
