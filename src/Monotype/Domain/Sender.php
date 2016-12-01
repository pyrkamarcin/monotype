<?php

namespace Monotype\Domain;

use React\EventLoop\Factory;
use React\SocketClient\TcpConnector;
use React\Stream\Stream;

/**
 * Class Cannon
 * @package Monotype\Domain
 */
class Sender
{
    /**
     * @var mixed
     */
    public $address;
    /**
     * @var mixed
     */
    public $port;

    /**
     * Cannon constructor.
     * @param Machine $machine
     */
    public function __construct(Machine $machine)
    {
        $this->address = $machine->getAddress();
        $this->port = $machine->getPort();
    }

    /**
     * @param $data
     */
    public function send($data)
    {
        $fp = stream_socket_client($this->address . ":" . $this->port, $errno, $errstr, $this->port);
        if (!$fp) {
            echo "$errstr ($errno)<br />\n";
        } else {
            fwrite($fp, $data . PHP_EOL);
            fclose($fp);
        }
    }

    public function sendAsReact($data)
    {

        $loop = Factory::create();

        $tcpConnector = new TcpConnector($loop);

        $tcpConnector->create('127.0.0.1', 4001)->then(function (Stream $stream) use ($data) {
            $stream->write($data);
            $stream->end();
        });

        $loop->run();
    }
}
