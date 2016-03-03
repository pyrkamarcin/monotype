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

//$socket = new \MEF\SocketBundle\Socket\SocketClient();
//$socket->setPort(4001);
//$socket->setProtocol('tcp');
//$socket->setHost('192.168.100.101');
//
//
//dump($socket);


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


$deferred = new React\Promise\Deferred();
