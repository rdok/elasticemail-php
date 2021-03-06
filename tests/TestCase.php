<?php

namespace Tests;

use ElasticEmail\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function mockElasticEmailAPIRequest(
        $apiKey = 'key',
        array $middlewares = []
    )
    {
        $mockHandler = new MockHandler([
            new Response(200, [], json_encode(['success' => true])),
        ]);

        return new Client($apiKey, $middlewares, $mockHandler);
    }
}
