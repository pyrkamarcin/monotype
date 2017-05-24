<?php

require_once __DIR__ . '/vendor/autoload.php';

use React\Datagram;
use React\Dns\Resolver;
use React\EventLoop;

$loop = EventLoop\Factory::create();
$factory = new Resolver\Factory();

$resolver = $factory->createCached('8.8.8.8', $loop);
$factory = new Datagram\Factory($loop, $resolver);

$factory->createClient('127.0.0.1:4000')->then(function (Datagram\Socket $client) {
    $client->send('test');
    $client->end();
});

$loop->run();