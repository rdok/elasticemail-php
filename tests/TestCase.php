<?php

namespace Tests;

use ElasticEmail\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function mockElasticEmailAPIRequest(&$container = [], $key = 'key')
    {
        $history = Middleware::history($container);
        $mockHandler = new MockHandler([
            new Response(200, [], json_encode(['success' => true])),
        ]);

        return new Client($key, [$history], $mockHandler);
    }
}
