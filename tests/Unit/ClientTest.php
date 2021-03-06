<?php

namespace Tests\Unit;

use ElasticEmail\Client;
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
}
