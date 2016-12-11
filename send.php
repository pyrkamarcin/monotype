<?php

$loader = require __DIR__ . '/vendor/autoload.php';
$factory = new \Socket\Raw\Factory();

$socket = $factory->createClient('tcp://192.168.0.114:4001');
$socket->write('test');
$socket->close();
