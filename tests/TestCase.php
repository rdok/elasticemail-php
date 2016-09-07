<?php

namespace Tests;

use Dotenv\Dotenv;
use ElasticEmail\ElasticEmailV2;
use ElasticEmail\V2\Responses\Email\EmailResponse;
use Faker\Factory;
use PHPUnit_Framework_TestCase;
use VCR\VCR;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{
    const TRAVIS_CI = 'travis-ci';
    const APP_ENV = 'APP_ENV';
    const ELASTIC_EMAIL_API_KEY = 'ELASTIC_EMAIL_API_KEY';
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
    /**
     * @var string
     */
    protected $env;

    public function setUp()
    {
        parent::setUp();

        $this->env = getenv(self::APP_ENV);

        if ($this->env !== self::TRAVIS_CI) {
            $dotEnv = new Dotenv(__DIR__.'/..');
            $dotEnv->load();
        } else {
        }

        $this->faker = Factory::create();
        $this->elasticEmail = new ElasticEmailV2(getenv(self::ELASTIC_EMAIL_API_KEY));
    }

    public function tearDown()
    {
        parent::tearDown();

        if (is_null($this->casseteName) || $this->env == self::TRAVIS_CI) {
            return;
        }

        VCR::eject();
        VCR::turnOff();
        $this->casseteName = null;
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
            'from'    => $this->getRecipientEmail()
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

    protected function loadVcr($casseteName)
    {
        if ($this->env == self::TRAVIS_CI) {
            return;
        }

        $this->casseteName = $casseteName;
        VCR::turnOn();
        VCR::insertCassette($casseteName);
    }
}
