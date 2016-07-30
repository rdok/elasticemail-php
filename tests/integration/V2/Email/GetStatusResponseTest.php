<?php

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/6/16
 */
class GetStatusResponseTest extends TestCase
{
    /**
     * @test
     * @vcr integration.email.response.getStatus.yml
     */
    public function receive_successful_response_when_getting_email_status()
    {
        $sendEmailResponse = $this->elasticEmail->email()->send($this->emailData);
        $getStatusData = ['transactionID' => $sendEmailResponse->getTransactionId()];
        $getStatusResponse = $this->elasticEmail->email()->getStatus($getStatusData);

        $this->assertTrue($getStatusResponse->wasSuccessful());
        $this->assertNull($getStatusResponse->getErrorMessage());
        $this->assertSame($sendEmailResponse->getTransactionId(), $getStatusResponse->getId);
        $this->assertSame('complete', $getStatusResponse->getStatus());
    }
}