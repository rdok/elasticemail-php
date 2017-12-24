<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\unit;

use ElasticEmail\ElasticEmailClient;
use ElasticEmail\ElasticEmailException;

class ElasticEmailClientTest extends UnitTestCase
{
    const API_KEY = 'api-key';

    /** @var  ElasticEmailClient */
    private $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = new ElasticEmailClient(self::API_KEY);
    }

    /** @test */
    public function uses_correct_api_base_uri()
    {
        $actualBaseUri = (string)$this->client->getConfig('base_uri');

        $this->assertEquals(ElasticEmailClient::$baseUri, $actualBaseUri);
    }

    /** @test */
    public function throws_missing_api_key_exception()
    {
        $this->expectException(ElasticEmailException::class);

        $this->expectExceptionMessage('ElasticEmail API key is missing.');

        new ElasticEmailClient(null);
    }
}