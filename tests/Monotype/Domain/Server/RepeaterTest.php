<?php

namespace Monotype\Domain\Server;

class RepeaterTest extends \PHPUnit_Framework_TestCase
{
    public function testRepeaterConstructor()
    {
        $repeater = new Repeater('0.0.0.0', '4001');
        $this->assertEquals('4001', $repeater->getPort());
    }
}
