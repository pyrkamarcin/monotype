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
     * @param int $port
     */
    public function __construct($host = 'localhost', $port = 4001)
    {
        $this->loop = \React\EventLoop\Factory::create();

        $this->factory = new \React\Datagram\Factory($this->loop);

        $this->factory->createServer($host . ':' . $port)->then(function (\React\Datagram\Socket $client) {
            $client->on('message', function ($message, $serverAddress, $client) {
                echo 'received "' . $message . '" from ' . $serverAddress . PHP_EOL;
            });
            $client->send('response test');
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
