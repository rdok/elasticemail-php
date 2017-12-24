<?php

namespace Tests\unit;

use ElasticEmail\ElasticEmail;
use ElasticEmail\Email\Email;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */
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
