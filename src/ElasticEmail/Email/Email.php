<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace ElasticEmail\Email;

use ElasticEmail\ElasticEmailClient;

/**
 * Access to Email API end points.
 * @see http://api.elasticemail.com/public/help#Email_header
 */
class Email
{
    /** @var ElasticEmailClient */
    private $client;

    public function __construct(ElasticEmailClient $client)
    {
        $this->client = $client;
    }

    public function send()
    {
        return new Send($this->client);
    }
}