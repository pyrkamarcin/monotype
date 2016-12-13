<?php

namespace Monotype\Utils;

use Symfony\Component\Console\Output\OutputInterface;
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
     * @param OutputInterface $output
     * @param string $host
     */
    public function __construct(SymfonyStyle $io, $host = 'localhost')
    {
        $this->loop = \React\EventLoop\Factory::create();

        $this->factory = new \React\Datagram\Factory($this->loop);

        $this->factory->createServer($host . ':' . 4000)->then(function (\React\Datagram\Socket $client) use ($io) {
            $client->on('message', function ($message, $serverAddress, $client) use ($client, $io) {
                $io->text('received command "' . $message . '" from ' . $serverAddress);
                $command = new ServerCommand($client, $message);
            });
        });

        $this->factory->createServer($host . ':' . 4001)->then(function (\React\Datagram\Socket $client) use ($io) {
            $client->on('message', function ($message, $serverAddress, $client) use ($client, $io) {
                $io->text('received message (' . strlen($message) . ') "' . $message . '" from ' . $serverAddress);
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
