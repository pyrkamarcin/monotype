<?php

namespace Monotype\Server;

use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Class ServerTest
 * @package Monotype\Server
 */
class ServerTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testServerRuning()
    {
    }
}
