<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests;

use ElasticEmail\Email;
use ElasticEmail\Email\Send;
use GuzzleHttp\Client;
use Tests\unit\UnitTestCase;

class EmailTest extends UnitTestCase
{
    /** @test */
    public function has_access_to_send_client()
    {
        $email = new Email(new Client('api-key'));

        $this->assertInstanceOf(Send::class, $email->send());
    }


    /** @test */
    public function behaviour_for_sending_emails_is_used_correctly()
    {
        $client = $this->createMock(Client::class);

        new Email($client);
    }
}