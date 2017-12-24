<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\unit;

use ElasticEmail\ElasticEmail\ClientInterface;
use ElasticEmail\Client;
use GuzzleHttp\Middleware;
use Tests\TestCase;

abstract class UnitTestCase extends TestCase
{
    public function appendsApiKey($apiEndPointClient)
    {
        $container = [];
        $history = Middleware::history($container);

        $client = new Client($apiKey = 'api-key', [$history]);

        /** @var ClientInterface $send */
        $send = new $apiEndPointClient($client);

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