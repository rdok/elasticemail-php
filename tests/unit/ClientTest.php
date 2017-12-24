<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\unit;

use ElasticEmail\Client;
use ElasticEmail\ElasticEmailException;

class ClientTest extends UnitTestCase
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
        $this->expectException(ElasticEmailException::class);

        $this->expectExceptionMessage('ElasticEmail API key is missing.');

        new Client(null);
    }
}