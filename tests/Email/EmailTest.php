<?php
/**
 * @author  Rizart Dokollari
 * @since   12/24/17
 */

namespace Tests\Email;

use ElasticEmail\Client;
use ElasticEmail\ElasticEmailException;
use ElasticEmail\Email\Email;
use ElasticEmail\Email\Send;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /** @test */
    public function has_access_to_send_client()
    {
        $this->expectException(ElasticEmailException::class);

        $email = new Email(new Client('api-key'));

        $this->assertInstanceOf(Send::class, $email->send());
    }
}
