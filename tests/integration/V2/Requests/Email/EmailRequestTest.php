<?php
namespace Tests\integration\V2\Requests\Email;

use Tests\TestCase;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class EmailRequestTest extends TestCase
{
    /**
     * @test
     * @vcr data_can_be_used_multiple_times.yml
     */
    public function data_can_be_used_multiple_times()
    {
        $response = $this->sendSuccessfulEmail();

        $this->assertNotNull($response->getData());

        $this->assertNotNull($response->getData());
    }

    /**
     * @test
     * @vcr transaction_id_is_different_on_each_email_send.yml
     */
    public function transaction_id_is_different_on_each_email_send()
    {
        $response = $this->sendSuccessfulEmail();

        $secondResponse = $this->sendSuccessfulEmail();

//        $this->assertNotEquals($response-, $secondResponse);
    }

///** @test */
//    public function email_send_request_is_initialized_successfully()
//    {
// $this->loadVcr(__FUNCTION__);
//        $emailResponse = $this->elasticEmail->email()->send($this->emailData);
//
//        $this->assertInstanceOf(EmailResponse::class, $emailResponse);
//
//        $this->assertNotNull($emailResponse);
//    }
//
//    public function gets_successful_status_response()
//    {
//$this->loadVcr(__FUNCTION__);
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
//     * @expectedException Exception
//     */
//    public function apikey_is_missing()
//    {
//$this->loadVcr(__FUNCTION__);
//        $this->expectExceptionMessage('Missing required parameter: apikey');
//
//        new EmailRequest([BaseRequest::BASE_URI_KEY => 'some-base-uri']);
//    }
//
//    /**
//     * @test
//     * @expectedException Exception
//     */
//    public function base_uri_is_missing()
//    {
//         $this->loadVcr(__FUNCTION__);
//        $this->expectExceptionMessage('Missing required parameter: base_uri');
//
//        new EmailRequest([BaseRequest::API_KEY => 'some-api']);
//    }
}
