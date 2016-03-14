<?php

$fp = stream_socket_client("192.168.1.21:4001", $errno, $errstr, 4001);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {

    $contents = null;
    $all = null;

    var_dump($fp);

    while (!feof($fp)) {

        $rand = rand(1, 999);
        $timeparts = explode(" ", microtime());
//        $milliseconds = bcadd(($timeparts[0] * 1000), bcmul($timeparts[1], 1000));

        $the_date_time = new DateTime('now');
        sleep(1);
        echo $the_date_time->format("c") . "\r\n";

        fwrite($fp, $the_date_time->format("c") . " : " . $rand . "\r\n");

//        $contents = fread($fp, 16);
//        file_put_contents("dump.txt", $contents, FILE_APPEND | LOCK_EX);
//        $all .= $contents;
//
//        echo $contents;
    }
    fclose($fp);
}
