<?php
use Dotenv\Dotenv;
use Src\V2\ElasticEmailV2;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @var ElasticEmailV2
     */
    protected $elasticEmailV2;

    /**
     * @var array
     */
    protected $emailData;

    public function setUp()
    {
        parent::setUp();

        $dotenv = new Dotenv(__DIR__.'/..');
        $dotenv->load();

        $this->elasticEmailV2 = new ElasticEmailV2(['apikey' => getenv('ELASTIC_EMAIL_API_KEY')]);

        $this->emailData = [
            'from'      => '***REMOVED***',
            'from_name' => 'From Name',
            'to'        => '***REMOVED***',
            'subject'   => 'Subject',
            'body_html' => "<p>Body Html</p><hr>",
            'body_text' => 'Body Text',
        ];
    }
}