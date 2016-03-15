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
    public $socket;

    /**
     * Connector constructor.
     * @param \Monotype\Domain\Hal\Machine $machine
     */
    public function __construct(Machine $machine)
    {
        $this->machine = $machine;
    }

    /**
     * @return bool
     */
    public function prepareSocket()
    {
        $this->socket = new Socket(
            $this->machine->getProtocol(),
            $this->machine->getAddress(),
            $this->machine->getPort()
        );
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
