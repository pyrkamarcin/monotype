<?php

$loader = require __DIR__ . '/vendor/autoload.php';
$factory = new \Socket\Raw\Factory();

$socket = $factory->createClient('tcp://192.168.100.113:4001');
echo($socket->read(2));
