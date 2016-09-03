<?php
namespace Tests\integration\V2\Requests\Email;

use Tests\TestCase;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class EmailRequestTest extends TestCase
{
    /** @test */
    public function data_can_be_used_multiple_times()
    {
        $this->loadVcr('data_can_be_used_multiple_times.yml');

        $response = $this->sendSuccessfulEmail();

        $this->assertNotNull($response->getData());

        $this->assertNotNull($response->getData());
    }

    /** @test */
    public function transaction_id_is_different_on_each_email_send()
    {
        $this->loadVcr('transaction_id_is_different_on_each_email_send.yml');

        $response = $this->sendSuccessfulEmail();

        $secondResponse = $this->sendSuccessfulEmail();

//        $this->assertNotEquals($response-, $secondResponse);
    }

//    /**
//     * @test
//     * @vcr email_send_request_is_initialized_successfully.yml
//     */
//    public function email_send_request_is_initialized_successfully()
//    {
//          $this->loadVcr('email_send_request_is_initialized_successfully.yml');
//        $emailResponse = $this->elasticEmail->email()->send($this->emailData);
//
//        $this->assertInstanceOf(EmailResponse::class, $emailResponse);
//
//        $this->assertNotNull($emailResponse);
//    }
//
//    /**
//     * @test
//     * @vcr gets_successful_status_response.yml
//     */
//    public function gets_successful_status_response()
//    {
//        $emailResponse = $this->elasticEmail->email()->send($this->emailData)->getResponse();
//
//        $getStatusData = ['transactionID' => $emailResponse->getTransactionId()];
//
//        $response = $this->elasticEmail->email()->getStatus($getStatusData);
//
//        $this->assertInstanceOf(GetStatusResponse::class, $response);
//
//        $this->assertNotNull($response);
//    }
//
//    /**
//     * @test
//     * @vcr integration.email.send.request.missing_apikey.yml
//     * @expectedException Exception
//     */
//    public function apikey_is_missing()
//    {
//        $this->expectExceptionMessage('Missing required parameter: apikey');
//
//        new EmailRequest([BaseRequest::BASE_URI_KEY => 'some-base-uri']);
//    }
//
//    /**
//     * @test
//     * @vcr integration.email.send.request.missing_base_uri.yml
//     * @expectedException Exception
//     */
//    public function base_uri_is_missing()
//    {
//        $this->expectExceptionMessage('Missing required parameter: base_uri');
//
//        new EmailRequest([BaseRequest::API_KEY => 'some-api']);
//    }
}
