<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */

namespace Src\Api\V2\Requests;

use Src\Api\BaseRequest;
use Src\Api\Request;
use Src\Api\V2\Responses\SendResponse;

class SendRequest extends BaseRequest implements Request
{
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    public function send(array $emailData)
    {
        $response = $this->httpClient->request('POST', 'email/send', [
            'form_params' =>
                array_merge($this->config, $emailData)
            ,
        ]);

        return (new SendResponse($response));
    }
}