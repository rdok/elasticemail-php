<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */

namespace ElasticEmail;

use ElasticEmail\V2\Requests\Email\EmailRequest;

class ElasticEmail
{
    const API_KEY = 'apikey';
    protected $baseUrlV2 = 'https://api.elasticemail.com/v2/';
    private $apiKey;
    private $emailRequest;

    public function __construct($apiKey)
    {
        if (is_null($apiKey)) {
            throw new ElasticEmailException('ElasticEmail API key is missing.');
        }

        $this->apiKey = $apiKey;
    }

    /** @return Email */
    public function email()
    {
        return new Email;

        if (is_null($this->getEmailRequest())) {

            $emailRequest = new EmailRequest(
                $this->baseUrlV2,
                [self::API_KEY => $this->apiKey]
            );

            $this->setEmailRequest($emailRequest);
        }

        return $this->getEmailRequest();
    }

    /**
     * @return mixed
     */
    public function getEmailRequest()
    {
        return $this->emailRequest;
    }

    /**
     * @param mixed $emailRequest
     */
    public function setEmailRequest($emailRequest)
    {
        $this->emailRequest = $emailRequest;
    }
}
