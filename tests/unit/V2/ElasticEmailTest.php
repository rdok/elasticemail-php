<?php

use Dotenv\Dotenv;
use Src\V2\ElasticEmailV2;
use Src\V2\Email\EmailRequest;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */
class ElasticEmailTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ElasticEmailV2
     */
    protected $elasticEmail;

    public function setUp()
    {
        $dotenv = new Dotenv(__DIR__.'/../../../');
        $dotenv->load();

        $this->elasticEmail = new ElasticEmailV2(['apikey' => getenv('ELASTIC_EMAIL_API_KEY')]);
    }

    /** @test */
    public function initializes_send_request()
    {
        $this->assertInstanceOf(EmailRequest::class, $this->elasticEmail->email()->getRequest());
    }
}
