<?php

namespace Tests\Integration;

use Dotenv\Dotenv;
use Tests\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected function loadEnv(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
    }
}
