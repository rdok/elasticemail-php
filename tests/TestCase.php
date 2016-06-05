<?php
use Dotenv\Dotenv;

/**
 * @author Rizart Dokollari <***REMOVED***>
 * @since 6/5/16
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();

        $dotenv = new Dotenv(__DIR__.'/..');
        $dotenv->load();
    }
}