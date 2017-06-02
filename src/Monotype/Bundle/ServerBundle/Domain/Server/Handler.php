<?php

namespace Monotype\Bundle\ServerBundle\Domain\Server;

use React\Datagram\Socket;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class Handler
 * @package Monotype\Server
 */
class Handler
{
    /**
     * @var SymfonyStyle
     */
    public $inputOutput;

    /**
     * @var
     */
    public $client;

    /**
     * @var
     */
    public $message;

    /**
     * @var
     */
    public $serverAddress;

    /**
     * @var
     */
    private $address;

    /**
     * @var
     */
    private $port;

    /**
     * @var
     */
    public $io;

    /**
     * Handler constructor.
     * @param SymfonyStyle $inputOutput
     * @param Socket $client
     * @param string $message
     * @param string $serverAddress
     */
    public function __construct(SymfonyStyle $inputOutput, Socket $client, string $message, string $serverAddress)
    {
        $this->io = $inputOutput;
        $this->client = $client;
        $this->message = $message;
        $this->serverAddress = $serverAddress;
    }

    /**
     * @param $address
     * @param $port
     */
    public function setHost($address, $port)
    {
        $this->address = $address;
        $this->port = $port;
    }
}
