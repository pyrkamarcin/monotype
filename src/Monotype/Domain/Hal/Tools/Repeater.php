<?php

namespace Monotype\Domain\Hal\Tools;

/**
 * Class Repeater
 * @package Monotype\Domain\Hal
 */
class Repeater
{
    /**
     * @var
     */
    public $socket;

    /**
     * @var array
     */
    public $clients = array();

    public function __construct($address, $port)
    {

        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            throw new \Exception ('socket_create() failed: reason:' . socket_strerror(socket_last_error()));
        }

        $this->server_loop($address, $port);

        return true;
    }

    /**
     * @param $address
     * @param $port
     */
    function server_loop($address, $port)
    {
        if (($this->socket = socket_create(AF_INET, SOCK_STREAM, 0)) < 0) {
            echo "failed to create socket: " . socket_strerror($this->socket) . "\n";
            exit();
        }

        if (($ret = socket_bind($this->socket, $address, $port)) < 0) {
            echo "failed to bind socket: " . socket_strerror($ret) . "\n";
            exit();
        }

        if (($ret = socket_listen($this->socket, 0)) < 0) {
            echo "failed to listen to socket: " . socket_strerror($ret) . "\n";
            exit();
        }

        socket_set_nonblock($this->socket);

        while (true) {
            if (($newc = socket_accept($this->socket)) !== false) {
                echo "Client $newc has connected\n";
                $this->clients[] = $newc;

            }
        }
    }
}
