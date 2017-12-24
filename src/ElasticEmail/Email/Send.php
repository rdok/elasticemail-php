<?php

namespace ElasticEmail\Email;

use ElasticEmail\ElasticEmailClient;
use ElasticEmail\ElasticEmailHelpers;

/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 * @see http://api.elasticemail.com/public/help#Email_Send
 */
class Send
{
    const URI = 'email/send';
    use ElasticEmailHelpers;

    /** @var ElasticEmailClient */
    private $client;

    public function __construct(ElasticEmailClient $client)
    {
        $this->client = $client;
    }

    public function handle(array $params = [])
    {
        $this->response = $this->client
            ->request('POST', self::URI, ['body' => json_encode($params)]);

        return $this;
    }
}