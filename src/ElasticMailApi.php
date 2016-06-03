<?php
/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */

namespace Src;

class ElasticMailApi
{

    /**
     * ElasticMailApi constructor.
     * @param array $array
     */
    public function __construct($array)
    {
    }

    public function send($emailData)
    {
        return $this;
    }

    public function getStatusCode()
    {
        return 200;
    }
}