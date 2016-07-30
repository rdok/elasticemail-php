<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src\V2\Requests;

interface Request
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getHttpClient();
}