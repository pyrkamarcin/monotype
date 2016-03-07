<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Machine;

/**
 * Class Connector
 * @package Monotype\Domain\Hal
 */
class Connector
{
    /**
     * @var \Monotype\Domain\Hal\Machine
     */
    protected $machine;

    /**
     * Connector constructor.
     * @param \Monotype\Domain\Hal\Machine $machine
     */
    public function __construct(Machine $machine)
    {
        $this->machine = $machine;
    }
}
