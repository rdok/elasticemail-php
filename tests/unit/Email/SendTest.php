<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace tests\unit\Email;

use ElasticEmail\ElasticEmailClient;
use ElasticEmail\Email\Send;
use Tests\unit\UnitTestCase;

class SendTest extends UnitTestCase
{
    /** @test */
    public function appends_api_key()
    {
        $this->appendsApiKey(Send::class);
    }

    /** @test */
    public function forward_params_as_http_query()
    {
        $client = $this->getMockBuilder(ElasticEmailClient::class)
            ->setConstructorArgs(['api-key'])
            ->getMock();

        $params = ['any-parameter' => 'any-parameter-value'];

        $expectedParams = ['body' => json_encode($params)];

        $client->expects($this->once())
            ->method('request')
            ->with('POST', Send::URI, $expectedParams);

        /** @var ElasticEmailClient $client */

        $send = new Send($client);

        $send->handle($params);
    }
}