<?php

namespace Tests\Monotype\Domain\Hal;

use Monotype\Domain\Hal\Machine;

/**
 * Class MachineTest
 * @package Tests\Monotype\Domain\Hal
 */
class MachineTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $machine = new Machine('1');
        $result = $machine->getParametrs();

        $this->assertEquals('CTX1', $result['name']);
    }
}
