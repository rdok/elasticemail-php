<?php
use Src\ElasticEmailV2;
use Src\Exceptions\ElasticEmailV2Exception;
use Src\V2\Requests\BaseRequest;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */
class ElasticEmailV2Test extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function throws_missing_base_uri_key()
    {
        $this->expectException(ElasticEmailV2Exception::class);

        $this->expectExceptionMessage('Missing base uri.');

        new ElasticEmailV2([]);
    }

    /** @test */
    public function throws_missing_api_key()
    {
        $this->expectException(ElasticEmailV2Exception::class);

        $this->expectExceptionMessage('Missing API key.');

        new ElasticEmailV2([BaseRequest::BASE_URI_KEY => 'some-url']);
    }
}