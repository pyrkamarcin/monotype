<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Connector\Buffer;
use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Dumper\Stock;
use React\EventLoop\Factory;
use React\Socket\Connection;
use React\Socket\Server;
use Symfony\Component\Serializer\Serializer;

/**
 * Class Reactor
 * @package Monotype\Domain\Hal
 */
class Reactor
{
    /**
     * @var \Monotype\Domain\Hal\Connector\Buffer
     */
    private $buffer;

    /**
     * @var \React\EventLoop\ExtEventLoop|\React\EventLoop\LibEventLoop|\React\EventLoop\LibEvLoop|\React\EventLoop\StreamSelectLoop
     */
    private $loop;

    /**
     * @var \React\Socket\Server
     */
    private $socket;

    /**
     * @var \Monotype\Domain\Hal\Dumper
     */
    private $stock;

    protected $address;
    protected $port;

    public function __construct(Machine $machine)
    {
        $this->buffer = new Buffer();
        $this->stock = new Dumper(new Stock());

        $this->loop = Factory::create();
        $this->socket = new Server($this->loop);

        $this->address = $machine->getAddress();
        $this->port = $machine->getPort();
    }

    public function listen()
    {
        $this->socket->listen($this->port, $this->address);
    }

    public function on()
    {

        $stock = $this->stock;
        $buffer = $this->buffer;

        $this->socket->on('connection', function (Connection $conn) use ($buffer, $stock) {

            $conn->on('data', function ($data) use ($conn, $buffer, $stock) {

                $buffer->setCache($data);

                if (strspn($buffer->getCache(), 'close')) {
                    $conn->close();
                    exit();
                }

                if (strpos($buffer->getCache(), PHP_EOL) !== false) {
                    echo $buffer->getCache();
                }

                $stock->stockize($buffer->getCache());
            });
        });
    }

    public function run()
    {
        $this->loop->run();
    }
}
