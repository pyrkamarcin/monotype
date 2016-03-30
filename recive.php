<?php

require_once 'app/autoload.php';


$loop = React\EventLoop\Factory::create();

$client = stream_socket_client('tcp://192.168.100.113:4001');
$conn = new React\Stream\Stream($client, $loop);
$conn->pipe(new React\Stream\Stream(STDOUT, $loop));
$conn->on('data', function ($data) use ($conn) {
    echo $data;
});

$loop->run();
