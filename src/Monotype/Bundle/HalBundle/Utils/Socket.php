<?php

namespace Monotype\Bundle\HalBundle\Utils;

/**
 * Class Socket
 * @package Monotype\Bundle\HalBundle\Utils
 */
class Socket
{

    /**
     * @var
     */
    public $socket;
    /**
     * @var string
     */
    public $remote_socket;
    /**
     * @var
     */
    protected $protocol;
    /**
     * @var
     */
    protected $address;
    /**
     * @var
     */
    protected $port;

    /**
     * Socket constructor.
     * @param $protocol
     * @param $address
     * @param $port
     */
    public function __construct($protocol, $address, $port)
    {
        $this->setProtocol($protocol);
        $this->setAddress($address);
        $this->setPort($port);

        $this->remote_socket = $this->composeSocket();
    }

    /**
     * @param mixed $protocol
     */
    private function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     * @param mixed $address
     */
    private function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $port
     */
    private function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    private function composeSocket()
    {
        return $this->getProtocol() . "://" . $this->getAddress() . ":" . $this->getPort();
    }

    /**
     * @return mixed
     */
    private function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @return mixed
     */
    private function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    private function getPort()
    {
        return $this->port;
    }

    /**
     * @param $message
     */
    public function write($message)
    {
        fwrite($this->socket, $message);
    }

    /**
     * @param $buffor
     * @return mixed
     */
    public function read($buffor)
    {
        return fread($this->socket, $buffor);
    }

    /**
     * @throws \Exception
     */
    public function openStream()
    {
        $socket = stream_socket_client($this->remote_socket, $errno, $errstr);
        if (!$socket) {
            throw new \Exception("Can't open socket.");
        } else {
            $this->socket = $socket;
        }
    }

    /**
     * @throws \Exception
     */
    public function closeStream()
    {
        if ($this->socket) {
            fclose($this->socket);
        } else {
            throw new \Exception("Can't closed socket. There have been opened.");
        }
    }
}
