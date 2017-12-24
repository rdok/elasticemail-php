<?php

namespace Tests;

use ElasticEmail\ElasticEmail;
use ElasticEmail\Email;
use Tests\unit\UnitTestCase;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */
class ElasticEmailTest extends UnitTestCase
{
    /** @test */
    public function has_access_to_send_email_object()
    {
        $expectedEmailObject = new Email;

        $elasticEmail = new ElasticEmail('api-key');

        $emailObject = $elasticEmail->email();

        $this->assertEquals($expectedEmailObject, $emailObject);
    }
}
