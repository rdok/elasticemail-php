<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace Tests\unit;


class TestCase extends \Tests\TestCase
{
    public function setUp()
    {
        parent::setUp();

        $dotEnv = new Dotenv(__DIR__ . '/..');

        $dotEnv->load();
    }
}