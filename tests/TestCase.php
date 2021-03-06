<?php

namespace Tests;

use ElasticEmail\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
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

    protected function assertAPIRequestQueryHas($container, string $string)
    {
        $this->assertMiddlewarePushed($container);
        $this->assertArrayHasKey('request', $container[0]);

        /** @var Request $request */
        $request = $container[0]['request'];

        $this->assertEquals($string, $request->getUri()->getQuery());
    }

    protected function assertMiddlewarePushed($container = [])
    {
        $error = 'Expected history middleware was not pushed.';

        $this->assertCount(1, $container, $error);
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

    protected function assertAPIRequestMultipartHas(array $params, array $container)
    {
        $this->assertMiddlewarePushed($container);
        $this->assertArrayHasKey('request', $container[0]);

        /** @var Request $request */
        $request = $container[0]['request'];

        $contents = $request->getBody()->getContents();

        $expected = sprintf('name="%s"', $params['name']);
        $this->assertContains($expected, $contents);

        $expected = sprintf("\r\n%s\r\n", $params['contents']);
        $this->assertContains($expected, $contents);

        $expected = sprintf("Content-Length: %s\r\n", strlen($params['contents']));
        $this->assertContains($expected, $contents);
    }
}
