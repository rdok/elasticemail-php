<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */

namespace Src\V2\Email\Send;

use Src\BaseRequest;
use Src\Request;

class SendRequest extends BaseRequest implements Request
{
    public function send(array $emailData)
    {
        $response = $this->httpClient->request('POST', 'email/send', [
            'form_params' => array_merge($this->config, $emailData),
        ]);

        return (new SendResponse($response));
    }
}