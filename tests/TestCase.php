<?php

namespace Tests;

use Dotenv\Dotenv;
use ElasticEmail\ElasticEmailV2;
use ElasticEmail\V2\Responses\Email\EmailResponse;
use PHPUnit_Framework_TestCase;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @var ElasticEmailV2
     */
    protected $elasticEmail;

    /**
     * @var array
     */
    protected $emailData;

    public function setUp()
    {
        parent::setUp();

        if (getenv('APP_ENV') !== 'travis-ci') {
            $dotEnv = new Dotenv(__DIR__.'/..');
            $dotEnv->load();
        }

        $this->elasticEmail = new ElasticEmailV2(getenv('ELASTIC_EMAIL_API_KEY'));

        $this->emailData = [
            'from'      => $this->getSenderEmail(),
            'from_name' => 'John Shepard',
            'to'        => $this->getRecipientEmail(),
            'subject'   => $this->getSubjectEmail(),
            'body_html' => "<p>Body Html</p><hr>",
            'body_text' => 'Body Text',
        ];
    }

    protected function getSenderEmail()
    {
        return getenv('SINGLE_TESTER_EMAIL');
    }

    protected function getRecipientEmail()
    {
        return getenv('SINGLE_TESTER_EMAIL');
    }

    protected function getSubjectEmail()
    {
        return getenv('EMAIL_SUBJECT');
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
}
