<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace ElasticEmail;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;


/** HTTP client: sets correct base URI & api key. */
class ElasticEmailClient extends \GuzzleHttp\Client
{
    static $baseUri = 'https://api.elasticemail.com/v2/';

    public function __construct($apiKey, array $middlewares = [])
    {
        if (empty($apiKey)) {
            throw new ElasticEmailException('ElasticEmail API key is missing.');
        }

        parent::__construct([
            'base_uri' => self::$baseUri,
            'handler'  => $this->handler($apiKey, $middlewares),
        ]);
    }

    public function handler($apikey, array $middlewares = [])
    {
        $stack = HandlerStack::create();

        $stack->push(
            Middleware::mapRequest(
                function (RequestInterface $request) use ($apikey) {
                    return $request->withUri(
                        Uri::withQueryValue(
                            $request->getUri(), 'apikey', $apikey
                        )
                    );
                }
            )
        );

        foreach ($middlewares as $middleware) {
            $stack->push($middleware);
        }

        return $stack;
    }
}