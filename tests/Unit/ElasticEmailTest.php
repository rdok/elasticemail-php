<?php

namespace Tests\Unit;

use ElasticEmail\ElasticEmail;
use ElasticEmail\Email\Email;

class ElasticEmailTest extends UnitTestCase
{
    /** @test */
    public function has_access_to_email_send()
    {
        $elasticEmail = new ElasticEmail('api-key');

        $emailObject = $elasticEmail->email();

        $this->assertInstanceOf(Email::class, $emailObject);
    }
}
