<?php

$socket = stream_socket_client("tcp://192.168.100.101:4001", $errno, $errstr);
if (!$socket) {
    echo "$errstr ($errno)<br />\n";
} else {

//    var_dump($socket);

    fwrite($socket, "test\r\n");

//    socket_send($fp, "test string", 11, MSG_OOB);

//    while (!feof($fp)) {
//
////        $rand = rand(1, 999);
////        $timeparts = explode(" ", microtime());
////        $milliseconds = bcadd(($timeparts[0] * 1000), bcmul($timeparts[1], 1000));
////
////        $the_date_time = new DateTime('now');
////        sleep(1);
////
////        fwrite($fp, $the_date_time->format("c") . ":" . $milliseconds . " : " . $rand . "\r\n");
//
////        $contents = fread($fp, 16);
////        file_put_contents("dump.txt", $contents, FILE_APPEND | LOCK_EX);
////        $all .= $contents;
////
////        echo $contents;
//    }
    fclose($socket);
}
