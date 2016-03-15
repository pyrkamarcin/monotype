<?php

require_once 'bootstrap.php';

$loop = \React\EventLoop\Factory::create();

$socket = new \React\Socket\Server($loop);
$socket->listen(4001, '0.0.0.0');

$stock = new \Monotype\Domain\Hal\Dumper(new \Monotype\Domain\Hal\Dumper\Stock());
$buffer = '';

$socket->on('connection', function (\React\Socket\Connection $conn) use ($buffer, $stock) {

    $conn->on('data', function ($data) use ($conn, $buffer, $stock) {

        $buffer .= $data;

        if (strspn($buffer, 'close')) {
            $conn->close();
            exit();
        }

        if (strpos($buffer, PHP_EOL) !== false) {
            echo $buffer;
        }

        $stock->stockize(__toString($buffer));
    });


});

$loop->run();
