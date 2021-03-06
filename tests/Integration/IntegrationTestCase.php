<?php

namespace Tests\Integration;

use Dotenv\Dotenv;
use Tests\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected function loadEnv(): void
    {
        print_r($_ENV);
        if ($_ENV['CI'] === true) {
            return;
        }

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
    }
}
