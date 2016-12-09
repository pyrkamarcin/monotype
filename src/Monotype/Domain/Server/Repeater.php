<?php

namespace Monotype\Domain\Server;

/**
 * Class Repeater
 * @package Monotype\Domain\Server
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

    /**
     * @var string
     */
    protected $ip;
    /**
     * @var int
     */
    protected $port;

    /**
     * Repeater constructor.
     * @param string $ip
     * @param int $port
     */
    public function __construct(string $ip, int $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    function run()
    {

        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            throw new \Exception ('socket_create() failed: reason:' . socket_strerror(socket_last_error()));
        }

        if (($this->socket = socket_create(AF_INET, SOCK_STREAM, 0)) < 0) {
            echo "failed to create socket: " . socket_strerror($this->socket) . "\n";
            exit();
        }

        if (($ret = socket_bind($this->socket, $this->getIp(), $this->getPort())) < 0) {
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

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }
}
