<?php

namespace Tests\Unit;

use ElasticEmail\Client;
use ElasticEmail\ElasticEmailException;
use Tests\TestCase;
use TypeError;

class ClientTest extends UnitTestCase
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
        $this->expectException(ElasticEmailException::class);

        new Client('');
    }

    /** @test */
    public function it_appends_api_key_as_query_string()
    {
        $container = [];

        $client = $this->mockElasticEmailAPIRequest($container, $key = 'key');

        $client->request('POST');

        $this->assertAPIRequestQueryHas($container, "apikey=$key");
    }
}
