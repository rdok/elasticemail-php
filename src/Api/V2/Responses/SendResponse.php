<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\Api\V2\Responses;

use Src\Api\BaseResponse;
use Src\Api\Response;

class SendResponse extends BaseResponse implements Response
{
    public function getTransactionId()
    {
        return 'test';
    }
}