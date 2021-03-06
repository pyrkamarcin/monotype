<?php

namespace Monotype\Bundle\ServerBundle\Domain\Model;

use PHPUnit\Framework\TestCase;

/**
 * Class MachineTest
 * @package Monotype\Domain\Model
 */
class MachineTest extends TestCase
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
