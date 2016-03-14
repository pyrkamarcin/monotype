<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Connector\Socket;

/**
 * Class Connector
 * @package Monotype\Domain\Hal
 */
class Connector
{
    /**
     * @var \Monotype\Domain\Hal\Machine
     */
    protected $machine;

    /**
     * @var array
     */
    protected $parametrs;

    /**
     * @var resource
     */
    protected $socket;

    /**
     * Connector constructor.
     * @param \Monotype\Domain\Hal\Machine $machine
     */
    public function __construct(Machine $machine)
    {
        $this->machine = $machine;
        $this->parametrs = $machine->getParametrs();
    }

    /**
     * @return bool
     */
    public function prepareSocket()
    {
        $protocol = $this->parametrs['protocol'];
        $address = $this->parametrs['address'];
        $port = $this->parametrs['port'];
        $this->socket = new Socket($protocol, $address, $port);

        if ($this->socket) {
            return true;
        }
    }

    /**
     * @return mixed
     */
    public function open()
    {
        return $this->socket->openStream();
    }

    /**
     * @return mixed
     */
    public function close()
    {
        return $this->socket->closeStream();

    }
}
