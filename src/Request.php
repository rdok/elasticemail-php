<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/4/16
 */

namespace Src;

interface Request
{
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getHttpClient();
}