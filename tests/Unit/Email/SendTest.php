<?php

namespace Tests\Unit\Email;

use ElasticEmail\Email\Send;
use Tests\Unit\UnitTestCase;

class SendTest extends UnitTestCase
{
    /** @test */
    public function forwards_params_as_http_body()
    {
        $container = [];
        $client = $this->mockAPIRequest($container);
        $send = new Send($client);

        $params = ['any-parameter' => 'any-parameter-value'];
        $send->handle($params);

        $this->assertAPIRequestBodyHas($params, $container);
    }

    /** @test */
    public function use_multipart_option_to_send_files()
    {
        $container = [];
        $client = $this->mockAPIRequest($container);
        $send = new Send($client);

        $params = [$name = 'any-parameter' => $content = 'file-content'];
        $expected = ['name' => $name, 'contents' => $content];

        $send->handle($params, true);

        $this->assertAPIRequestMultipartHas($expected, $container);
    }
}
