<?php

require_once 'bootstrap.php';

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);

$socket->on('connection', function ($conn) {


    $conn->on('data', function ($data, $conn) {
        // Write data back to the connection
        $conn->write($data);


        echo 'test';
    });
});
// Listen on port 1337
$socket->listen(4001);
$loop->run();


//$reactor = new \Monotype\Domain\Hal\Reactor(new \Monotype\Domain\Hal\Machine('B'));
//$reactor->listen();
//$reactor->write('test');
//$reactor->on();

//$fp = stream_socket_client("192.168.1.16:4001", $errno, $errstr, 4001);
//if (!$fp) {
//    echo "$errstr ($errno)<br />\n";
//} else {
//
//    $contents = null;
//    $all = null;
//    fwrite($fp, "test" . rand(100000, 1000000) . PHP_EOL);
//    fclose($fp);
//
//}


//    while (!feof($fp)) {
//
//        $rand = rand(1, 999);
//        $timeparts = explode(" ", microtime());
////        $milliseconds = bcadd(($timeparts[0] * 1000), bcmul($timeparts[1], 1000));
//
//        $the_date_time = new DateTime('now');
//        sleep(1);
//        echo $the_date_time->format("c") . "\r\n";
//
//        fwrite($fp, $the_date_time->format("c") . " : " . $rand . "\r\n");
//
////        $contents = fread($fp, 16);
////        file_put_contents("dump.txt", $contents, FILE_APPEND | LOCK_EX);
////        $all .= $contents;
////
////        echo $contents;
//    }
//    fclose($fp);
//}
