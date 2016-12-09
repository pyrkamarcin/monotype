<?php

namespace Monotype\Domain\Connector;

/**
 * Class Socket
 * @package Monotype\BundleBundle\Utils
 */
class Socket
{
    /**
     * @var
     */
    public $socket;

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

        $this->socket = $this->composeSocket();
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
    private function composeSocket(): string
    {
        return $this->getProtocol() . '://' . $this->getAddress() . ':' . $this->getPort();
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
     * @param $length
     */
    public function write($message, $length)
    {
        if (isset($this->socket)) {

            fwrite($this->socket, $message, $length);
        }
    }

    /**
     * @param $buffor
     * @return mixed
     */
    public function read($buffor)
    {
        if (isset($this->socket)) {

            return fread($this->socket, $buffor);
        }
    }

    /**
     * @throws \Exception
     */
    public function openStream()
    {
        $socket = stream_socket_client($this->socket, $errno, $errstr);

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

            if (isset($this->socket)) {
                fclose($this->socket);
            }
        } else {
            throw new \Exception("Can't closed socket. There have been opened.");
        }
    }
}
