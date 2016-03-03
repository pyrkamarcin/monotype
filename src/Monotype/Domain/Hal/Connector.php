<?php

namespace Monotype\Domain\Hal;

/**
 * Class Connector
 * @package Monotype\Domain\Hal
 */
class Connector
{
    public $socket;

    public function getSocket()
    {
        return $this->socket;
    }

    public function setSocket($socket)
    {
        $this->socket = $socket;
    }
}
