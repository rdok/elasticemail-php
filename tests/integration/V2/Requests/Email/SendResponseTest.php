<?php

namespace Tests\integration\V2\Email;

use Tests\TestCase;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */
class SendResponseTest extends TestCase
{
    /** @test */
    public function returns_valid_transaction_id()
    {
        $this->markTestIncomplete();

        $this->loadVcr(__FUNCTION__);

        $response = $this->elasticEmail->email()->send($this->emailData);

        $this->assertSame(200, $response->getHttpClient()->getStatusCode());

        $this->assertTrue($response->wasSuccessful());

        $this->assertNull($response->getErrorMessage());

        $this->assertNotEmpty($response->getData());

        $this->assertNotEmpty($response->getTransactionId());
    }
}
