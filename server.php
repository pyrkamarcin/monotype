<?php

require_once __DIR__ . '/vendor/autoload.php';

use React\Datagram;
use React\EventLoop;

$loop = EventLoop\Factory::create();
$factory = new Datagram\Factory($loop);

$factory->createServer('0.0.0.0:4000')->then(
    function (Datagram\Socket $client) {
        $client->on('message', function ($message, $serverAddress) {
            echo 'received "' . $message . '" from ' . $serverAddress . PHP_EOL;
        });
    });

$loop->run();
