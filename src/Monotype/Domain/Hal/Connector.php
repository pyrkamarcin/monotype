<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Machine;

class Connector
{
    protected $machine;
    protected $socket;

    public function __construct(Machine $machine)
    {
        $this->machine = $machine;
    }
}
