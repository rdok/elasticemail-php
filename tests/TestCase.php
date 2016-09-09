<?php

namespace Tests;

use Dotenv\Dotenv;
use ElasticEmail\ElasticEmailV2;
use ElasticEmail\V2\Responses\Email\EmailResponse;
use Faker\Factory;
use PHPUnit_Framework_TestCase;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{
    const APP_ENV = 'APP_ENV';
    const ELASTIC_EMAIL_API_KEY = 'ELASTIC_EMAIL_API_KEY';
    const INTEGRATION_SERVER = 'integration_server';
    /**
     * @var ElasticEmailV2
     */
    protected $elasticEmail;

    /**
     * @var array
     */
    protected $emailData;
    /**
     * @var Factory
     */
    protected $faker;
    /**
     * @var string
     */
    protected $casseteName;

    public function setUp()
    {
        parent::setUp();

        if ($this->getAppEnv() !== self::INTEGRATION_SERVER) {
            $dotEnv = new Dotenv(__DIR__.'/..');
            $dotEnv->load();
        }

        $this->faker = Factory::create();
        $this->elasticEmail = new ElasticEmailV2(getenv(self::ELASTIC_EMAIL_API_KEY));
    }

    protected function getSenderEmail()
    {
        return getenv('SINGLE_TESTER_EMAIL');
    }

    /**
     * @return EmailResponse
     */
    protected function sendSuccessfulEmail()
    {
        $response = $this->elasticEmail->email()->send([
            'to'      => $this->getRecipientEmail(),
            'subject' => $this->getSubjectEmail(),
            'from'    => "from-{$this->getRecipientEmail()}"
        ]);

        return $response;
    }

    protected function getRecipientEmail()
    {
        return getenv('SINGLE_TESTER_EMAIL');
    }

    protected function getSubjectEmail()
    {
        return getenv('EMAIL_SUBJECT');
    }

    protected function getAppEnv()
    {
        return getenv('APP_ENV');
    }
}
