<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace tests\unit\Email;

use ElasticEmail\ElasticEmailClient;
use ElasticEmail\Email\Send;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Tests\unit\UnitTestCase;

class SendTest extends UnitTestCase
{
    /** @test */
    public function appends_api_key()
    {
        $container = [];
        $history = Middleware::history($container);

        $send = new Send(new ElasticEmailClient($apiKey = 'api-key', [$history]));

        $send->handle();

        $this->assertCount(
            1, $container,
            'Expected history middleware was not pushed.'
        );

        /** @var Request $request */
        $request = $container[0]['request'];

        $this->assertEquals("apikey=$apiKey", $request->getUri()->getQuery());
    }
}