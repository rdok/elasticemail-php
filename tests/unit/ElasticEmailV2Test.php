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
    public function throws_missing_base_uri_key()
    {
        $this->expectException(ElasticEmailV2Exception::class);

        $this->expectExceptionMessage('Missing base uri.');

        new ElasticEmailV2([]);
    }
}