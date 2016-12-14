<?php

namespace Monotype\Utils;

use React\Datagram;
use React\EventLoop;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ServerListening
 * @package Monotype\Utils
 */
class ServerListening
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
     * ServerListening constructor.
     * @param SymfonyStyle $io
     * @param string $host
     */
    public function __construct(SymfonyStyle $io, string $host = 'localhost')
    {
        $this->loop = EventLoop\Factory::create();

        $this->factory = new Datagram\Factory($this->loop);

        $this->factory->createServer($host . ':' . 4000)->then(function (Datagram\Socket $client) use ($io) {
            $client->on('message', function ($message, $serverAddress, Datagram\Socket $client) use ($io) {
                $io->text('received command "' . $message . '" from ' . $serverAddress);
                return new ServerCommand($io, $client, $message);
            });
        });

        $this->factory->createServer($host . ':' . 4001)->then(function (Datagram\Socket $client) use ($io) {
            $client->on('message', function ($message, $serverAddress, Datagram\Socket $client) use ($io) {
                $handler = new BasicHandler($io, $client, $message, $serverAddress);
                $handler->createFile();
            });
        });
    }

    /**
     *
     */
    public function run()
    {
        $this->loop->run();
    }
}
