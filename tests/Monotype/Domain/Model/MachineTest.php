<?php

namespace Monotype\Domain\Model;

/**
 * Class MachineTest
 * @package Monotype\Domain\Model
 */
class MachineTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testMachineConstructor()
    {
        $machine = new Machine([
            'id' => '0',
            'name' => 'repeater',
            'protocol' => 'tcp',
            'address' => '192.168.100.15',
            'port' => '4001',
            'location' => 'none'
        ]);
        $this->assertEquals('tcp', $machine->getProtocol());
    }
}
