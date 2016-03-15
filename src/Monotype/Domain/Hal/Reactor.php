<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Connector\Buffer;
use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Dumper\Stock;
use React\EventLoop\Factory;
use React\Socket\Server;

class Reactor
{
    /**
     * @var \Monotype\Domain\Hal\Connector\Buffer
     */
    private $buffer;

    /**
     * @var \React\EventLoop\ExtEventLoop|\React\EventLoop\LibEventLoop|\React\EventLoop\LibEvLoop|\React\EventLoop\StreamSelectLoop
     */
    public $loop;

    /**
     * @var \React\Socket\Server
     */
    public $socket;

    /**
     * @var \Monotype\Domain\Hal\Dumper
     */
    private $stock;

    public function __construct(Machine $machine)
    {
        $this->buffer = new Buffer();
        $this->stock = new Dumper(new Stock());

        $this->loop = Factory::create();
        $this->socket = new Server($this->loop);
    }
}
