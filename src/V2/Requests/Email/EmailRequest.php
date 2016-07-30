<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */

namespace Src\V2\Requests\Email;

use Src\V2\Email\EmailResponse;
use Src\V2\Requests\BaseRequest;
use Src\V2\Requests\Request;

class EmailRequest extends BaseRequest implements Request
{
    /**
     * @var EmailResponse
     */
    protected $response;

    /**
     * @param array $emailData
     * @return $this
     */
    public function send(array $emailData)
    {
        $response = $this->getHttpClient()->request('POST', 'email/send', [
            'form_params' => array_merge($this->config, $emailData),
        ]);

        $this->setResponse(new EmailResponse($response));

        return $this;
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getHttpClient()
    {
        // TODO: Implement getHttpClient() method.
    }

    /**
     * @return EmailResponse
     * @throws RequestException
     */
    public function getResponse()
    {
        if (is_null($this->response)) {
            throw new RequestException('No previous request has been done.');
        }

        return $this->response;
    }

    /**
     * @param EmailResponse $response
     * @return EmailRequest
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    public function getStatus()
    {
        return new GetStatusResponse($this->response->getHttpClient());
    }
}