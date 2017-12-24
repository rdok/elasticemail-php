<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\unit;

use ElasticEmail\Client;
use ElasticEmail\ElasticEmailException;
use GuzzleHttp\Psr7\Uri;

class ClientTest extends UnitTestCase
{
    /** @test */
    public function uses_correct_api_base_uri()
    {
        $client = new Client('api-key');

        $expectedBaseUri = Client::$baseUri;

        /** @var Uri $actualBaseUri */
        $actualBaseUri = (string)$client->getConfig('base_uri');

        $this->assertEquals($expectedBaseUri, $actualBaseUri);
    }

    /** @test */
    public function appends_api_key()
    {

    }

    /** @test */
    public function throws_missing_api_key_exception()
    {
        $this->expectException(ElasticEmailException::class);

        $this->expectExceptionMessage('ElasticEmail API key is missing.');

        new Client(null);
    }
}