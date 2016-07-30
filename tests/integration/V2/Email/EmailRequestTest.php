<?php
namespace Tests\integration\V2\Email;

use Src\V2\Email\EmailRequest;
use Src\V2\Email\EmailResponse;
use Tests\TestCase;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class EmailRequestTest extends TestCase
{
    /**
     * @test
     * @vcr email_send_request_is_initialized_successfully.yml
     */
    public function email_send_request_is_initialized_successfully()
    {
        $emailResponse = $this->elasticEmail->email()->send($this->emailData);

        $this->assertInstanceOf(EmailResponse::class, $emailResponse);

        $this->assertNotNull($emailResponse);
    }

    /**
     * @test
     * @vcr gets_successful_status_response.yml
     */
    public function gets_successful_status_response()
    {
        $emailResponse = $this->elasticEmail->email()->send($this->emailData)->getResponse();

        $getStatusData = ['transactionID' => $emailResponse->getTransactionId()];

        $response = $this->elasticEmail->email()->getStatus($getStatusData);

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