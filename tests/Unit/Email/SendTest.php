<?php

namespace Tests\Unit\Email;

use ElasticEmail\Email\Send;
use GuzzleHttp\Psr7\Request;
use Tests\TestCase;

class SendTest extends TestCase
{
    /** @test */
    public function forwards_params_as_http_body()
    {
        $container = [];
        $client = $this->mockElasticEmailAPIRequest($container);
        $send = new Send($client);

        $params = ['any-parameter' => 'any-parameter-value'];
        $send->handle($params);

        $error = 'Expected history middleware was not pushed.';
        $this->assertCount(1, $container, $error);

        /** @var Request $request */
        $request = $container[0]['request'];

        $expected = http_build_query($params);
        $actual = (string)$request->getBody();
        $this->assertSame($expected, $actual);
    }

//    /** @test */
//    public function use_multipart_option_to_send_files()
//    {
//        $client = $this->getMockBuilder(Client::class)
//            ->setConstructorArgs(['api-key'])
//            ->getMock();
//
//        $params = [$name = 'any-parameter' => $content = 'any-parameter-value'];
//
//        $expectedParams = ['multipart' => [
//            [
//                'name' => $name,
//                'contents' => $content
//            ]
//        ]];
//
//        $client->expects($this->once())
//            ->method('request')
//            ->with('POST', Send::URI, $expectedParams);
//
//        /** @var Client $client */
//
//        $send = new Send($client);
//
//        $send->handle($params, true);
//    }
}
