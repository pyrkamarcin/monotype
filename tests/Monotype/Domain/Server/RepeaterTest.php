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

https://www.facebook.com/jebthecat/photos/a.906011376169387.1073741846.522074544563074/969943289776195/?type=3&theater