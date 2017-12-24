<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */

namespace Tests\integration;

use ElasticEmail\ElasticEmail;
use ElasticEmail\ElasticEmailException;
use ElasticEmail\Email\Send;

class ElasticEmailTest extends IntegrationTestCase
{
    /** @test */
    public function sends_a_successful_email()
    {
        /** @var Send $send */
        $send = $this->elasticEmail->email()->send([
            'to'      => 'invalid-to@email.com',
            'from'    => 'invalid-from@email.com',
            'subject' => 'Subject Value',
        ]);

        $this->assertTrue($send->wasSuccessful());
    }


    /** @test */
    public function converts_server_errors_to_exceptions()
    {
        $this->expectException(ElasticEmailException::class);

        $this->expectExceptionMessage("Incorrect apikey");

        $elasticEmail = new ElasticEmail('api-key');

        $elasticEmail->email()->send([]);
    }
}
