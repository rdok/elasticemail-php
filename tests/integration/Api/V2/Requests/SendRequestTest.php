<?php
use Dotenv\Dotenv;
use Faker\Factory;
use Faker\Generator;
use Src\Api\Response;
use Src\Api\V2\Requests\SendRequest;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class SendRequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Generator
     */
    protected $faker;
    /**
     * @var SendRequest
     */
    protected $sendRequest;
    protected $emailData;

    public function setUp()
    {
        parent::setUp();

        $this->faker = Factory::create();
        $dotenv = new Dotenv(__DIR__.'/../../../../../');
        $dotenv->load();
        $this->sendRequest = new SendRequest(['apikey' => getenv('ELASTIC_EMAIL_API_KEY')]);
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

        $this->sendRequest = new SendRequest([]);
    }
}