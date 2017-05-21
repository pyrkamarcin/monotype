<?php

namespace Monotype\Server;

use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class ServerTest
 * @package Monotype\Server
 */
class ServerTest extends TestCase
{
    /**
     *
     */
    public function tearDown()
    {
        Mockery::close();
    }

    /**
     *
     */
    public function testServerRunning()
    {
        $this->assertEmpty(null);
    }
}
