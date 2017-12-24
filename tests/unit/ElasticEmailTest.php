<?php

namespace Tests;

use ElasticEmail\ElasticEmail;
use ElasticEmail\ElasticEmailException;
use ElasticEmail\Email;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */
class ElasticEmailTest extends TestCase
{
    /** @test */
    public function throws_missing_api_key_exception()
    {
        $this->expectException(ElasticEmailException::class);

        $this->expectExceptionMessage('ElasticEmail API key is missing.');

        new ElasticEmail(null);
    }

    /** @test */
    public function has_access_to_send_email_object()
    {
        $expectedEmailObject = new Email;

        $emailObject = $this->elasticEmail->email();

        $this->assertEquals($expectedEmailObject, $emailObject);
    }
}
