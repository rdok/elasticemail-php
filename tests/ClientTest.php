<?php
/**
 * @author  Rizart Dokollari
 * @since   12/24/17
 */

namespace Tests;

use ElasticEmail\Client;

class ClientTest extends TestCase
{
    const API_KEY = 'api-key';

    /** @var  Client */
    private $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = new Client(self::API_KEY);
    }

    /** @test */
    public function uses_correct_api_base_uri()
    {
        $actualBaseUri = (string)$this->client->getConfig('base_uri');

        $this->assertEquals(Client::$baseUri, $actualBaseUri);
    }

    /** @test */
    public function throws_missing_api_key_exception()
    {
        $this->expectException(\TypeError::class);

        new Client(null);
    }
}
