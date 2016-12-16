<?php

namespace Monotype\Server;

use Monotype\Server\Command\ServerCommand;
use Monotype\Server\Handler\BasicHandler;
use React\Datagram;
use React\EventLoop;
use Symfony\Component\Console\Style\SymfonyStyle;

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
     * ServerListening constructor.
     * @param SymfonyStyle $inputOutput
     * @param string $host
     */
    public function __construct(SymfonyStyle $inputOutput, string $host = 'localhost')
    {
        $this->loop = EventLoop\Factory::create();

        $this->factory = new Datagram\Factory($this->loop);

        $this->factory->createServer($host . ':' . 4000)->then(function (Datagram\Socket $client) use ($inputOutput) {
            $client->on('message', function ($message, $serverAddress, Datagram\Socket $client) use ($inputOutput) {
                $inputOutput->text('received command "' . $message . '" from ' . $serverAddress);
                return new ServerCommand($inputOutput, $client, $message);
            });
        });

        $this->factory->createServer($host . ':' . 4001)->then(function (Datagram\Socket $client) use ($inputOutput) {
            $client->on('message', function ($message, $serverAddress, Datagram\Socket $client) use ($inputOutput) {
                $handler = new BasicHandler($inputOutput, $client, $message, $serverAddress);
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
