<?php

namespace Tests;

use ElasticEmail\ElasticEmail;
use ElasticEmail\Email\Email;

class ElasticEmailTest extends TestCase
{
    /** @test */
    public function has_access_to_send_email_object()
    {
        $elasticEmail = new ElasticEmail('api-key');

        $emailObject = $elasticEmail->email();

        $this->assertInstanceOf(Email::class, $emailObject);
    }
}
