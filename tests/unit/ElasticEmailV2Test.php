<?php
use Src\ElasticEmailV2;
use Src\Exceptions\ElasticEmailV2Exception;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */
class ElasticEmailV2Test extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function throws_missing_api_key_exception()
    {
        $this->expectException(ElasticEmailV2Exception::class);

        $this->expectExceptionMessage('Missing API key.');

        new ElasticEmailV2(null);
    }
}