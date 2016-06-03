<?php
use Dotenv\Dotenv;
use Faker\Factory;
use Src\ElasticMailApi;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/3/16
 */
class SendEmailTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;
    /**
     * @var \Src\ElasticMailApi
     */
    protected $elasticMailApi;

    public function setUp()
    {
        parent::setUp();

        $this->faker = Factory::create();
        $dotenv = new Dotenv(__DIR__.'/../../');
        $dotenv->load();
        $this->elasticMailApi = new ElasticMailApi([
            'account_email_address' => getenv('ACCOUNT_EMAIL_ADDRESS'),
            'account_api_key'       => getenv('ACCOUNT_API_KEY'),
        ]);
    }

    /** @test */
    public function sends_mail()
    {
        $emailData = [
            'from'      => $this->faker->email,
            'from_name' => $this->faker->name,
            'to'        => $this->faker->email,
            'subject'   => $this->faker->sentence,
            'body_html' => "<p>{$this->faker->paragraph}</p><hr>",
            'body_text' => $this->faker->paragraph,
        ];

        $response = $this->elasticMailApi->send($emailData);

        $this->assertNotNull($response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertNotNull(200, $response->getBody());
    }
}