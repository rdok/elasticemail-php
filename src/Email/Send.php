<?php

namespace ElasticEmail\Email;

use ElasticEmail\Client;
use ElasticEmail\Response;

/**
 * @see http://api.elasticemail.com/public/help#Email_Send
 */
class Send extends Response
{
    const URI = 'email/send';

    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function handle(array $params = [], $attachmentPaths = [])
    {
        $options = $this->transform($params, $attachmentPaths);

        $this->response = $this->client->request('POST', self::URI, $options);

        return $this;
    }

    protected function transform(array $params, array $attachmentPaths = [])
    {
        if (empty($attachmentPaths)) {
            return ['form_params' => $params];
        }

        $multipart = [];

        foreach ($params as $key => $value) {
            $multipart[] = [
                'name' => $key,
                'contents' => $value
            ];
        }

        foreach ($attachmentPaths as $path) {
            $pathParts = explode(DIRECTORY_SEPARATOR, $path);
            $filename = end($pathParts);

            $multipart[] = [
                'name' => $filename,
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }

        return ['multipart' => $multipart];
    }
}
