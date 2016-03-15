<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Connector\Buffer;
use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Dumper\Stock;

class Reactor
{
    public $buffer;
    public $loop;
    public $socket;
    private $stock;

    public function __construct(Machine $machine)
    {
        $this->buffer = new Buffer();
        $this->stock = new Dumper(new Stock());
    }
}
