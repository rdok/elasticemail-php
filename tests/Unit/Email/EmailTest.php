<?php

namespace Tests\Unit\Email;

use ElasticEmail\Email\Email;
use ElasticEmail\Email\Send;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /** @test */
    public function has_access_to_send_client()
    {
        $client = $this->mockElasticEmailAPIRequest();

        $email = new Email($client);

        $this->assertInstanceOf(Send::class, $email->send());
    }
}
