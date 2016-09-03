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

    /**
     * @return EmailResponse
     */
    protected function sendSuccessfulEmail()
    {
        $response = $this->elasticEmail->email()->send([
            'to'      => getenv('SINGLE_TESTER_EMAIL'),
            'subject' => getenv('EMAIL_SUBJECT'),
            'from'    => getenv('SINGLE_TESTER_EMAIL')
        ]);

        return $response;
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
