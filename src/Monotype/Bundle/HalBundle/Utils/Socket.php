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
     * @return string
     */
    public function composeSocket()
    {
        return $this->getProtocol() . "://" . $this->getAddress() . ":" . $this->getPort();
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param mixed $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
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
