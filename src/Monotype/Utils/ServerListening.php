<?php

namespace Monotype\Utils;

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
     * @param string $host
     */
    public function __construct($host = 'localhost')
    {
        $this->loop = \React\EventLoop\Factory::create();

        $this->factory = new \React\Datagram\Factory($this->loop);

        $this->factory->createServer($host . ':' . 4000)->then(function (\React\Datagram\Socket $client) {
            $client->on('message', function ($message, $serverAddress, $client) use ($client) {
                echo 'received command "' . $message . '" from ' . $serverAddress . PHP_EOL;
                return new Command($client, $message);
            });
        });

        $this->factory->createServer($host . ':' . 4001)->then(function (\React\Datagram\Socket $client) {
            $client->on('message', function ($message, $serverAddress, $client) {
                echo 'received message (' . strlen($message) . ') "' . $message . '" from ' . $serverAddress . PHP_EOL;
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
