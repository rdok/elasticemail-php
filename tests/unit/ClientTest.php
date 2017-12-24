<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\unit;

class ClientTest extends TestCase
{
    /** @test */
    public function throws_email_request_exception_if_base_uri_is_missing()
    {
        $this->setExpectedException(RequestException::class, 'Invalid base uri.');

        new EmailRequest(null, []);
    }

    /** @test */
    public function throws_email_request_exception_if_base_uri_is_invalid()
    {
        $this->setExpectedException(RequestException::class, 'Invalid base uri.');

        new EmailRequest('invalid', []);
    }
}