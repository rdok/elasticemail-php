<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\Api;

interface Response
{
    public function getHttpClient();

    /**
     * The API status response of the requested action.
     *
     * @return bool
     */
    public function wasSuccessful();

    /**
     * The API error message response of the requested action.
     *
     * @return bool
     */
    public function getErrorMessage();

    /**
     * The API data response.
     *
     * @return bool
     */
    public function getData();
}