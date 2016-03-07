<?php

namespace Monotype\Domain\Hal;

/**
 * Class Repeater
 * @package Monotype\Domain\Hal
 */
class Repeater
{

    public $socket;

    public function __construct()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            throw new \Exception ('socket_create() failed: reason:' . socket_strerror(socket_last_error()));
        }
        return true;
    }
}
