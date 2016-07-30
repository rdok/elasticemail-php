<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 7/30/16
 */

namespace Src\V2\Email;

use Src\Response;

class EmailResponse implements Response
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getHttpClient()
    {
        // TODO: Implement getHttpClient() method.
    }

    /**
     * The API status response of the requested action.
     *
     * @return bool
     */
    public function wasSuccessful()
    {
        // TODO: Implement wasSuccessful() method.
    }

    /**
     * The API error message response of the requested action.
     *
     * @return bool
     */
    public function getErrorMessage()
    {
        // TODO: Implement getErrorMessage() method.
    }

    /**
     * The API data response.
     *
     * @return array
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }
}