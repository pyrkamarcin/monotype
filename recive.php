<?php

require_once 'bootstrap.php';

//$socketStream = new \MEF\SocketBundle\Socket\SocketStream(
////    stream_socket_client("tcp://192.168.100.101:4001", $errno, $errstr, 4001),
//new \React\Stream\Stream("tcp://192.168.100.101:4001"),
//    null
//);
////$socketStream->write("test");
//
//$socketStream->read();
//
//dump($socketStream);


//$loop = React\EventLoop\Factory::create();
//
//$client = stream_socket_client('tcp://192.168.100.101:4001');
//$conn = new React\Stream\Stream($client, $loop);
//$conn->pipe(new React\Stream\Stream(STDOUT, $loop));
//$conn->write("Hello World!\r\n");
//
//$loop->run();

$socket = new \Monotype\Domain\Hal\Connector\Socket('tcp', '127.0.0.1', '4001');
$socket->openStream();

//$socket->write("test\r\n", 6);

//$hash = rand(1, 99999);
while (!feof($socket->socket)) {
    $contents = $socket->read(16);
//    $all .= $contents;
////    file_put_contents("tmp/dump$hash.txt", $contents, FILE_APPEND | LOCK_EX);
//
////    $dump = new \Monotype\Domain\Hal\Dumper(new \Monotype\Domain\Hal\Dumper\Stock());
////    $dump->stockize($contents);
    echo $contents;
}

$socket->closeStream();
