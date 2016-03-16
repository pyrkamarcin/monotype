<?php

namespace Monotype\Domain\Hal;

class Cannon
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
}
