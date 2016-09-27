<?php

namespace Monotype\Domain\Hal;

/**
 * Class Cannon
 * @package Monotype\Domain\Hal
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

        $loop = \React\EventLoop\Factory::create();

        $tcpConnector = new \React\SocketClient\TcpConnector($loop);

        $tcpConnector->create('127.0.0.1', 4001)->then(function (\React\Stream\Stream $stream) use ($data) {
            $stream->write($data);
            $stream->end();
        });

        $loop->run();
    }
}
