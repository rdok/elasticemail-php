<?php

namespace Tests\Unit\Email;

use ElasticEmail\Email\Email;
use ElasticEmail\Email\Send;
use ElasticEmail\Email\Status;
use Tests\Unit\UnitTestCase;

class EmailTest extends UnitTestCase
{
    /** @test */
    public function has_access_to_send_client()
    {
        $client = $this->mockElasticEmailAPIRequest();

        $email = new Email($client);

        $this->assertInstanceOf(Send::class, $email->send());
    }

    /** @test */
    public function has_access_to_email_status_check()
    {
        $client = $this->mockElasticEmailAPIRequest();

        $email = new Email($client);

        $this->assertInstanceOf(Status::class, $email->status());
    }
}
