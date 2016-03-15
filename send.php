<?php

require_once 'bootstrap.php';

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

$socket1 = new \Monotype\Domain\Hal\Connector\Socket('tcp', '127.0.0.1', '4001');
$socket1->openStream();
$socket1->write('test', 4);
$socket1->closeStream();


//$socket->openStream();
//
//$file = file_get_contents('program');
//
//$socket->write($file, filesize('program'));
//
//echo "ok!\r\n";
//$socket->closeStream();
