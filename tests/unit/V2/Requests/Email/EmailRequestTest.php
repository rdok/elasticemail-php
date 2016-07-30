<?php

namespace Tests\unit\V2\Requests\Email;

use PHPUnit_Framework_TestCase;
use Src\ElasticEmailV2;
use Src\V2\Requests\Email\EmailRequest;
use Src\V2\Requests\Email\RequestException;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */
class EmailRequestTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function throws_email_request_exception_if_base_uri_is_missing()
    {
        $this->expectException(RequestException::class);

        $this->expectExceptionMessage('Invalid base uri.');

        new EmailRequest(null, []);
    }

    /** @test */
    public function throws_email_request_exception_if_base_uri_is_invalid()
    {
        $this->expectException(RequestException::class);

        $this->expectExceptionMessage('Invalid base uri.');

        new EmailRequest('invalid', []);
    }
}