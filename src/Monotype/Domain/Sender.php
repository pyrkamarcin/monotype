<?php

namespace Monotype\Domain;

use Monotype\Domain\Model\Machine;
use React\EventLoop\Factory;
use React\SocketClient\TcpConnector;
use React\Stream\Stream;

class Sender
{
    public $address;

    public $port;

    public function __construct(Machine $machine)
    {
        $this->address = $machine->getAddress();
        $this->port = $machine->getPort();
    }

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

        $tcpConnector = new TcpConnector($loop, [$data]);

        $tcpConnector->create('127.0.0.1', 4001)->then(function (Stream $stream) use ($data) {
            $stream->write($data);
            $stream->end();
        });

        $loop->run();
    }
}
