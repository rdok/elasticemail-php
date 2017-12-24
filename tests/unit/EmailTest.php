<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests;

use ElasticEmail\Email;
use GuzzleHttp\Client;

class EmailTest extends UnitTestCase
{
    /** @test */
    public function behaviour_for_sending_emails_is_used_correctly()
    {
        $client = $this->createMock(Client::class);

        new Email($client);
    }
}