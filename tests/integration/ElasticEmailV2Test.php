<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */

namespace Tests\integration;

use ElasticEmail\V2\Requests\Email\RequestException;
use ElasticEmail\V2\Responses\Email\EmailResponse;
use Tests\TestCase;

class ElasticEmailV2Test extends TestCase
{
    /**
     * @test
     * @vcr sends_a_successful_email
     */
    public function sends_a_successful_email()
    {
        $response = $this->sendSuccessfulEmail();

        $this->assertInstanceOf(EmailResponse::class, $response);

        $this->assertTrue($response->wasSuccessful());

        $this->assertNull($response->getErrorMessage());

        $this->assertRegExp('/{"success":true,"data":{"transactionid":"/', $response->getData());
    }


    /** @test */
    public function throws_exception_if_no_recipient_is_set()
    {
        $this->loadVcr(__FUNCTION__);

        $this->setExpectedException(RequestException::class,
            "At least one recipient must be specified. Array key: 'to'");

        $this->elasticEmail->email()->send([]);
    }

    /**
     * @test
     * @dataProvider invalidEmailsProvider
     * @param $invalidEmail
     */
    public function throws_exception_if_no_recipient_email_is_invalid($invalidEmail)
    {
        $this->loadVcr(__FUNCTION__);

        $this->setExpectedException(RequestException::class, 'Invalid recipient email.');

        $this->elasticEmail->email()->send(['to' => $invalidEmail]);
    }

    public function invalidEmailsProvider()
    {
        return [
            ['invalid'],
            ['example.com1'],
            ['.@example.com1'],
        ];
    }

    /** @test */
    public function throws_exception_if_no_subject_is_specified()
    {
        $this->loadVcr(__FUNCTION__);

        $this->setExpectedException(RequestException::class, 'Subject field must be specified.');

        $this->elasticEmail->email()->send(['to' => getenv('SINGLE_TESTER_EMAIL')]);
    }

    /** @test */
    public function throws_exception_if_no_send_email_is_specified()
    {
        $this->loadVcr('throws_exception_if_no_send_email_is_specified');

        $this->setExpectedException(RequestException::class, 'Invalid FROM email address.');

        $this->elasticEmail->email()->send([
            'to'      => getenv('SINGLE_TESTER_EMAIL'),
            'subject' => getenv('EMAIL_SUBJECT')
        ]);
    }
}
