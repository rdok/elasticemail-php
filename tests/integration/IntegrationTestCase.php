<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\integration;

use ElasticEmail\ElasticEmail;
use Tests\TestCase;

class IntegrationTestCase extends TestCase
{
    const API_KEY = 'ELASTIC_EMAIL_API_KEY';

    /** @var  ElasticEmail */
    protected $elasticEmail;

    public function setUp()
    {
        parent::setUp();

        $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../..');

        $dotenv->load();

        $apiKey = getenv(self::API_KEY);

        $this->elasticEmail = new ElasticEmail($apiKey);
    }
}