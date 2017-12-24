<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace ElasticEmail;


/** HTTP client: sets correct base URI & api key. */
class Client extends \GuzzleHttp\Client
{
    static $baseUri = 'https://api.elasticemail.com/v2/';

    public function __construct($apiKey)
    {
        if (empty($apiKey)) {
            throw new ElasticEmailException('ElasticEmail API key is missing.');
        }

        parent::__construct([
            'base_uri' => self::$baseUri,
        ]);
    }
}