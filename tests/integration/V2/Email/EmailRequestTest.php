<?php
use Src\BaseRequest;
use Src\Response;
use Src\V2\Email\EmailRequest;
use Src\V2\Email\GetStatusResponse;
use Src\V2\Email\SendResponse;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class EmailRequestTest extends TestCase
{
    /**
     * @test
     * @vcr integration.email.send.request.yml
     */
    public function send_email_send_request()
    {
        $response = $this->elasticEmailV2->email()->send($this->emailData);

        $this->assertInstanceOf(SendResponse::class, $response);

        $this->assertNotNull($response);
    }

    /**
     * @test
     * @vcr integration.email.request.getStatus.yml
     */
    public function send_email_get_status_request()
    {
        $response = $this->elasticEmailV2->email()->send($this->emailData);

        $getStatusData = ['transactionID' => $response->getTransactionId()];

        $response = $this->elasticEmailV2->email()->getStatus($getStatusData);

        $this->assertInstanceOf(GetStatusResponse::class, $response);

        $this->assertNotNull($response);
    }

    /**
     * @test
     * @vcr integration.email.send.request.missing_apikey.yml
     * @expectedException Exception
     */
    public function apikey_is_missing()
    {
        $this->expectExceptionMessage('Missing required parameter: apikey');

        new EmailRequest([BaseRequest::BASE_URI_KEY => 'some-base-uri']);
    }

    /**
     * @test
     * @vcr integration.email.send.request.missing_base_uri.yml
     * @expectedException Exception
     */
    public function base_uri_is_missing()
    {
        $this->expectExceptionMessage('Missing required parameter: base_uri');

        new EmailRequest([BaseRequest::API_KEY => 'some-api']);
    }
}