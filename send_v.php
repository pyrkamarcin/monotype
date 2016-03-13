<?php


require_once 'bootstrap.php';

$address = '192.168.100.101';
$service_port = '4001';
$type = 'tcp';

echo "TCP Connection...: ";

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK\r\n";
}
//$result = socket_connect($socket, $address, $service_port);

//var_dump($socket);

echo "Attempting to connect to '$address' on port '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\r\n";
} else {
    echo "OK.\r\n";
}

$in = "Data to transfer.\r\n";
$in .= "Connection: Close\r\n\r\n";
$in .= file_get_contents("program");
$out = '';

echo "Sending HTTP HEAD request...";
socket_write($socket, $in, strlen($in));
echo "OK.\n";

echo "Reading response:\n\n";
$buf = 'This is my buffer.';
if (false !== ($bytes = socket_recv($socket, $buf, 4, MSG_WAITALL))) {
    echo "Read $bytes bytes from socket_recv(). Closing socket...";
} else {
    echo "socket_recv() failed; reason: " . socket_strerror(socket_last_error($socket)) . "\n";
}
socket_close($socket);

echo $buf . "\n";
echo "OK.\n\n";

//echo "Attempting to connect to '$address' on port '$service_port'...";
//
//$HAL = new \Monotype\Bundle\HalBundle\Utils\Socket($type, $address, $service_port);
//
//if ($HAL->socket === false) {
//    echo "failed.\nReason: ($HAL) " . socket_strerror(socket_last_error($HAL)) . "\n";
//} else {
//    echo "OK.\n";
//}
//
//$HAL->openStream();
//
////var_dump($HAL);
//
//$in = "HEAD / HTTP/1.1\r\n";
//$in .= "Host: www.example.com\r\n";
//$in .= "Connection: Close\r\n\r\n";
//$out = '';
//
//echo "Sending HTTP HEAD request...";
//socket_write($HAL->socket, $in, strlen($in));
//echo "OK.\n";


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

//$socket = new \Monotype\Bundle\HalBundle\Utils\Socket('tcp', '192.168.100.101', '4001');
//$socket->openStream();
//
//$file = file_get_contents('program');
//
//$socket->write($file, filesize('program'));
//
//$socket->closeStream();
