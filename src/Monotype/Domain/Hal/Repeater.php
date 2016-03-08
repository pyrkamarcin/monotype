<?php

namespace Monotype\Domain\Hal;

/**
 * Class Repeater
 * @package Monotype\Domain\Hal
 */
class Repeater
{

    /**
     * Coś takiego dobrze działa:
     *
     *
     *
     * $clients = array();
     * $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
     * socket_bind($socket, '127.0.0.1', 4001);
     * socket_listen($socket);
     * socket_set_nonblock($socket);
     *
     * while (true) {
     * if (($newc = socket_accept($socket)) !== false) {
     * echo "Client $newc has connected\n";
     * $clients[] = $newc;
     * }
     * }
     *
     * No i z tego trzeba zrobić Repeater :)
     */

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
