<?php

namespace Tests\Unit;

use ElasticEmail\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /** @test */
    public function it_maintains_api_baseuri()
    {
        $client = new Client('api_key');

        $actualBaseUri = (string)$client->getConfig('base_uri');

        $this->assertEquals(Client::$baseUri, $actualBaseUri);
    }

    /** @test */
    public function throws_missing_api_key_exception()
    {
        $this->expectException(\TypeError::class);

        new Client(null);
    }

    /** @test */
    public function it_appends_api_key_as_query_string()
    {
        $container = [];
        $client = $this->mockElasticEmailAPIRequest($container, $key = 'key');
        $client->request('POST');

        $this->assertCount(
            1, $container,
            'Expected history middleware was not pushed.'
        );

        /** @var Request $request */
        $request = $container[0]['request'];

        $this->assertEquals("apikey=$key", $request->getUri()->getQuery());
    }

}
