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
    public function send(array $emailData)
    {
        $response = $this->httpClient->request('POST', '/email/send', [
            'form_params' => [
                $emailData
            ],
        ]);

        return (new SendResponse($response));
    }

    public function getStatusCode()
    {
        return 200;
    }
}