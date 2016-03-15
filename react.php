<?php

require_once 'bootstrap.php';

$loop = \React\EventLoop\Factory::create();

$socket = new \React\Socket\Server($loop);
$socket->listen(4001, '0.0.0.0');

$stock = new \Monotype\Domain\Hal\Dumper(new \Monotype\Domain\Hal\Dumper\Stock());

$socket->on('connection', function (\React\Socket\Connection $conn) use ($stock) {
//    $conn->write('Hello state your resolve' . PHP_EOL);

    $buffer = '';
    $conn->on('data', function ($data) use ($conn, $buffer, $stock) {

        $buffer .= $data;

        if (strspn($buffer, 'close')) {
            $conn->close();
            exit();
        }

        if (strpos($buffer, PHP_EOL) !== false) {
            echo $buffer;
        }

        $stock->stockize($buffer);
    });


});

$loop->run();
