<?php

namespace Monotype\Domain\Hal;

/**
 * Class Connector
 * @package Monotype\Domain\Hal
 */
class Connector implements Link
{
    public $socket;

    public function setSocket($socket)
    {
        $this->socket = $socket;
    }
}
