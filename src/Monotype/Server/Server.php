<?php

namespace Monotype\Server;

use Monotype\Server\Handler\BasicHandler;
use React\Datagram;
use React\EventLoop;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class Server
 * @package Monotype\Server
 */
class Server
{
    /**
     * @var \React\EventLoop\ExtEventLoop|\React\EventLoop\LibEventLoop|\React\EventLoop\LibEvLoop|\React\EventLoop\StreamSelectLoop
     */
    protected $loop;

    /**
     * @var \React\Datagram\Factory
     */
    protected $factory;

    /**
     * @var int
     */
    private $port = 4000;

    /**
     * @var int
     */
    private $host;

    /**
     * ServerListening constructor.
     * @param SymfonyStyle $inputOutput
     * @param string $host
     */
    public function __construct(SymfonyStyle $inputOutput, string $host = 'localhost')
    {
        $this->loop = EventLoop\Factory::create();
        $this->host = $host;

        $this->factory = new Datagram\Factory($this->loop);

        $this->factory->createServer($this->host . ':' . $this->port)->then(function (Datagram\Socket $client) use ($inputOutput) {
            $client->on('message', function ($message, $serverAddress, Datagram\Socket $client) use ($inputOutput) {
                $handler = new BasicHandler($inputOutput, $client, $message, $serverAddress);
                $handler->setHost($this->host, $this->port);
                $handler->createHandler();
            });
        });
    }

    public function run()
    {
        $this->loop->run();
    }
}
