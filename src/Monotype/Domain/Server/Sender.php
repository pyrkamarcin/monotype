<?php

namespace Monotype\Domain\Server;

use Monotype\Domain\Model\Machine;
use React\EventLoop\Factory;
use React\SocketClient\TcpConnector;
use React\Stream\Stream;

/**
 * Class Sender
 * @package Monotype\Domain\Server
 */
class Sender
{
    /**
     * @var string
     */
    public $address;

    /**
     * @var int
     */
    public $port;

    /**
     * Sender constructor.
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
        $fp = stream_socket_client($this->address . ':' . $this->port, $errno, $errstr, $this->port);
        if (!$fp) {
            echo "$errstr ($errno)<br />\n";
        } else {
            fwrite($fp, $data . PHP_EOL);
            fclose($fp);
        }
    }

    /**
     * @param $data
     */
    public function sendAsReact($data)
    {
        $loop = Factory::create();

        $tcpConnector = new TcpConnector($loop, [$data]);

        $tcpConnector->create($this->address, $this->port)->then(function (Stream $stream) use ($data) {
            $stream->write($data);
            $stream->end();
        });

        $loop->run();
    }
}
