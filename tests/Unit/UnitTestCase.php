<?php

namespace Tests\Unit;

use ElasticEmail\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class UnitTestCase extends TestCase
{
    protected function mockAPIStatus(&$container = [], $key = 'key'): Client
    {
        $history = Middleware::history($container);

        $body = json_encode(['success' => true, 'data' => 'mocked-data']);
        $response = new Response(200, [], $body);
        $mockHandler = new MockHandler([$response]);

        return new Client($key, [$history], $mockHandler);
    }

    protected function mockAPIRequest(&$container = [], $key = 'key'): Client
    {
        $history = Middleware::history($container);
        $mockHandler = new MockHandler([
            new Response(200, [], json_encode(['success' => true])),
        ]);

        return new Client($key, [$history], $mockHandler);
    }

    protected function assertAPIRequestBodyHas(array $expected, $container)
    {
        $this->assertMiddlewarePushed($container);
        $this->assertArrayHasKey('request', $container[0]);

        /** @var Request $request */
        $request = $container[0]['request'];

        $actual = (string)$request->getBody();
        $expected = http_build_query($expected);
        $this->assertSame($expected, $actual);
    }

    protected function assertMiddlewarePushed($container = [])
    {
        $error = 'Expected history middleware was not pushed.';

        $this->assertCount(1, $container, $error);
    }

    protected function assertAPIRequestMultipartHas(
        array $params,
        array $container
    ) {
        $this->assertMiddlewarePushed($container);
        $this->assertArrayHasKey('request', $container[0]);

        /** @var Request $request */
        $request = $container[0]['request'];

        $contents = $request->getBody()->getContents();

        $expected = sprintf('name="%s"', $params['name']);
        $this->assertStringContainsString($expected, $contents);

        $expected = sprintf("\r\n%s\r\n", $params['contents']);
        $this->assertStringContainsString($expected, $contents);

        $contents = strlen($params['contents']);
        $expected = sprintf("Content-Length: %s\r\n", $contents);
        $this->assertStringContainsString($expected, $contents);
    }

    protected function assertAPIRequestQueryHas($container, $string)
    {
        $this->assertMiddlewarePushed($container);
        $this->assertArrayHasKey('request', $container[0]);

        /** @var Request $request */
        $request = $container[0]['request'];

        $this->assertEquals($string, $request->getUri()->getQuery());
    }

    protected function assertAPIBaseURIEquals($container, $string)
    {
        $this->assertArrayHasKey('request', $container[0]);

        /** @var Request $request */
        $request = $container[0]['request'];

        $this->assertEquals($string, $request->getUri()->getHost());
    }
}