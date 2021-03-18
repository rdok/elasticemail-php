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
    public function sends_email_with_attachments()
    {
        $container = [];
        $client = $this->mockAPIRequest($container);
        $send = new Send($client);

        $attachmentPaths = [$this->makeAttachment('attachment-content')];
        $send->handle(['generic-param' => 'param-contents'], $attachmentPaths);

        $this->assertAPIRequestHasMultipartField(
            ['generic-param' => 'param-contents'],
            $container
        );
        $this->assertAPIRequestHasMultipartFile(
            ['lorem.txt' => 'attachment-content'],
            $container
        );
    }
}
