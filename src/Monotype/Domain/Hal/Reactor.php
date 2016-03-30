<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Connector\Buffer;
use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Dumper\Stock;
use React\EventLoop\Factory;
use React\Socket\Connection;
use React\Socket\Server;
use React\Stream\Stream;

/**
 * Class Reactor
 * @package Monotype\Domain\Hal
 */
class Reactor
{
    /**
     * @var \Monotype\Domain\Hal\Connector\Buffer
     */
    public $buffer;

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
    public $stock;

    /**
     * @var mixed
     */
    protected $address;
    /**
     * @var mixed
     */
    protected $port;

    /**
     * Reactor constructor.
     * @param Machine $machine
     */
    public function __construct(Machine $machine)
    {
        $this->buffer = new Buffer();
        $this->stock = new Dumper(new Stock());

        $this->loop = Factory::create();

        $this->address = $machine->getAddress();
        $this->port = $machine->getPort();
    }

    /**
     * @throws \React\Socket\ConnectionException
     */
    public function listen()
    {

    }

    /**
     *
     */
    public function on()
    {


        $client = stream_socket_client('tcp://' . $this->address . ':' . $this->port);

        $conn = new Stream($client, $this->loop);

        $stock = $this->stock;
        $buffer = $this->buffer;

        $conn->on('data', function ($data) use ($conn, $buffer, $stock) {
            $conn->on('data', function ($data) use ($conn, $buffer, $stock) {


                echo $data;
//                $buffer->setCache($data);
//
//                if (strspn($buffer->getCache(), 'close')) {
//                    $conn->close();
//                    exit();
//                }
//
//                if (strpos($buffer->getCache(), PHP_EOL) !== false) {
////                    echo $buffer->getCache();
//                }
//
//                $stock->stockize($buffer->getCache());
            });
        });

//        $stock = $this->stock;
//        $buffer = $this->buffer;
//
//        $this->socket->on('connection', function (Connection $conn) use ($buffer, $stock) {
//
//            $conn->on('data', function ($data) use ($conn, $buffer, $stock) {
//
//                $buffer->setCache($data);
//
//                if (strspn($buffer->getCache(), 'close')) {
//                    $conn->close();
//                    exit();
//                }
//
//                if (strpos($buffer->getCache(), PHP_EOL) !== false) {
//                    echo $buffer->getCache();
//                }
//
//                $stock->stockize($buffer->getCache());
//            });
//        });
    }

    /**
     *
     */
    public function run()
    {
        $this->loop->run();
    }


    /**
     *
     */
    public function stop()
    {
        $this->loop->stop();
    }

    /**
     *
     */
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}
