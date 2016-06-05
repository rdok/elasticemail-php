<?php
use Src\BaseRequest;
use Src\Response;
use Src\V2\Email\Send;
use Src\V2\Email\Send\SendRequest;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class SendRequestTest extends TestCase
{
    /**
     * @var SendRequest
     */
    protected $sendRequest;
    protected $emailData;

    public function setUp()
    {
        parent::setUp();

        $this->sendRequest = new SendRequest([
            BaseRequest::APIKEY   => getenv('ELASTIC_EMAIL_API_KEY'),
            BaseRequest::BASE_URI => 'https://api.elasticemail.com/v2/'
        ]);

        $this->emailData = [
            'from'      => '***REMOVED***',
            'from_name' => 'From Name',
            'to'        => '***REMOVED***',
            'subject'   => 'Subject',
            'body_html' => "<p>Body Html</p><hr>",
            'body_text' => 'Body Text',
        ];
    }

    /**
     * @test
     * @vcr email.send.successful.yml
     */
    public function send_successful_email()
    {
        $response = $this->sendRequest->send($this->emailData);

        $this->assertInstanceOf(Response::class, $response);

        $this->assertNotNull($response);

        $this->assertSame(200, $response->getHttpClient()->getStatusCode());

        $this->assertTrue($response->wasSuccessful());

        $this->assertNull($response->getErrorMessage());

        $this->assertNotEmpty($response->getData());

        $this->assertNotEmpty($response->getTransactionId());
    }

    /**
     * @test
     * @vcr email.send.missing_apikey.yml
     * @expectedException Exception
     */
    public function apikey_is_missing()
    {
        $this->expectExceptionMessage('Missing required parameter: apikey');

        $this->sendRequest = new SendRequest([BaseRequest::BASE_URI => 'some-base-uri']);
    }

    /**
     * @test
     * @vcr email.send.missing_apikey.yml
     * @expectedException Exception
     */
    public function base_uri_is_missing()
    {
        $this->expectExceptionMessage('Missing required parameter: base_uri');

        $this->sendRequest = new SendRequest([BaseRequest::APIKEY => 'some-api']);
    }
}