<?php

namespace Tests\Unit\Email;

use ElasticEmail\Email\Status;
use Tests\Unit\UnitTestCase;

class StatusTest extends UnitTestCase
{
    /** @test */
    public function gets_status_of_an_email_send()
    {
        $client = $this->mockAPIStatus();
        $status = new Status($client);

        $actual = $status->request()->getBody();
        $expected = (object)['success' => true, 'data' => 'mocked-data'];

        $this->assertEquals($expected, $actual);
    }
}
