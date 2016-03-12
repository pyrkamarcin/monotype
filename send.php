<?php

error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();

require_once "app/autoload.php";

//$socketStream = new \MEF\SocketBundle\Socket\SocketStream(
////    stream_socket_client("tcp://192.168.100.101:4001", $errno, $errstr, 4001),
//    new \React\Stream\Stream("tcp://192.168.100.101:4001"),
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
//
//$file = file_get_contents('program');
//
//$conn->write($file);
//
//$loop->run();

$socket1 = new \Monotype\Domain\Hal\Connector\Socket('tcp', '192.168.100.101', '4001');
$socket1->openStream();
var_dump($socket1);
$socket1->closeStream();

$socket2 = new \Monotype\Domain\Hal\Connector(new \Monotype\Domain\Hal\Machine('1'));
$socket2->prepareSocket();
$socket2->open();
$socket2->close();

var_dump($socket2);

//$socket->openStream();
//
//$file = file_get_contents('program');
//
//$socket->write($file, filesize('program'));
//
//echo "ok!\r\n";
//$socket->closeStream();
