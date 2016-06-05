<?php
use Src\Response;
use Src\V2\ElasticEmailV2;
use Src\V2\Email\Send;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class SendRequestTest extends TestCase
{
    /**
     * @var ElasticEmailV2
     */
    protected $elasticEmail;
    protected $emailData;

    public function setUp()
    {
        parent::setUp();

        $this->elasticEmail = new ElasticEmailV2(['apikey' => getenv('ELASTIC_EMAIL_API_KEY')]);

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
        $response = $this->elasticEmail->email()->send($this->emailData);

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

        $this->elasticEmail = new ElasticEmailV2([]);

        $this->elasticEmail->email();
    }
}