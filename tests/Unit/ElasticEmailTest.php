<?php

namespace Tests\Unit;

use ElasticEmail\ElasticEmail;
use ElasticEmail\Email\Email;
use Tests\TestCase;

class ElasticEmailTest extends UnitTestCase
{
    /** @test */
    public function has_access_to_send_email_object()
    {
        $elasticEmail = new ElasticEmail('api-key');

        $emailObject = $elasticEmail->email();

        $this->assertInstanceOf(Email::class, $emailObject);
    }
}
