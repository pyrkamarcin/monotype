<?php

error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();

$address = '192.168.100.101';
$port = 4001;

require_once "app/autoload.php";

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

$socket = new \Monotype\Domain\Hal\Connector\Socket('tcp', '192.168.100.102', '4001');
$socket->openStream();

//$socket->write("test\r\n");

$hash = rand(1, 99999);
while (!feof($socket->socket)) {
    $contents = $socket->read(4);
    $all .= $contents;
    file_put_contents("tmp/dump$hash.txt", $contents, FILE_APPEND | LOCK_EX);
    echo $contents;
}

$socket->closeStream();
