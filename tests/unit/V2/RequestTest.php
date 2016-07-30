<?php

use Src\Exceptions\RequestException;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */
class RequestTest extends TestCase
{
    /** @test */
    public function throws_RequestException_if_request_is_null()
    {
        $this->expectException(RequestException::class);

        $this->expectExceptionMessage('No previous request has been done.');

        $this->elasticEmail->email()->getResponse();
    }
}