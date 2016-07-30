<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */

namespace Src;

use Src\Exceptions\ElasticEmailV2Exception;
use Src\V2\Email\EmailRequest;
use Src\V2\Requests\BaseRequest;

class ElasticEmailV2
{
    protected $baseUrlV2 = 'https://api.elasticemail.com/v2/';

    /**
     * @var array
     */
    private $config;
    /**
     * @var EmailRequest
     */
    private $emailRequest;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param array $config
     * @throws ElasticEmailV2Exception
     */
    public function setConfig($config)
    {
        if (!array_key_exists(BaseRequest::BASE_URI_KEY, $config)) {
            throw new ElasticEmailV2Exception('Missing base uri.');
        }
       
        $this->config[BaseRequest::BASE_URI_KEY] = $this->baseUrlV2;
    }

    /**
     * @return EmailRequest
     */
    public function email()
    {
        if (is_null($this->getEmailRequest())) {
            $this->setEmailRequest(new EmailRequest($this->config));
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