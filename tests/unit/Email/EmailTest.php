<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\Email;

use ElasticEmail\Client;
use ElasticEmail\Email\Email;
use ElasticEmail\Email\Send;
use Tests\unit\UnitTestCase;

class EmailTest extends UnitTestCase
{
    /** @test */
    public function has_access_to_send_client()
    {
        $email = new Email(new Client('api-key'));

        $this->assertInstanceOf(Send::class, $email->send());
    }
}