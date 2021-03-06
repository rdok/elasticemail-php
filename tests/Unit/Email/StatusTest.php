<?php

namespace Tests\Unit\Email;

use ElasticEmail\Email\Status;
use GuzzleHttp\Psr7\Request;
use Tests\Unit\UnitTestCase;

class StatusTest extends UnitTestCase
{
    /** @test */
    public function gets_status_of_an_email_send()
    {
        $client = $this->mockAPIStatus();
        $status = new Status($client);

        $actual = $status->request('message-id')->getBody();
        $expected = (object)['success' => true, 'data' => 'mocked-data'];

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function uses_correct_request_configuration()
    {
        $container = [];
        $client = $this->mockAPIStatus($container);
        $status = new Status($client);
        $status->request('message-id');

        $this->assertMiddlewarePushed($container);

        /** @var Request $request */
        $request = $container[0]['request'];
        $query = http_build_query([
            'messageID' => 'message-id', 'apikey' => 'key'
        ]);

        $this->assertSame('/v2/email/status', $request->getUri()->getPath());
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame($query, $request->getUri()->getQuery());
    }
}
