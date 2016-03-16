<?php

$fp = stream_socket_client("192.168.1.16:4001", $errno, $errstr, 4001);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {

    $contents = null;
    $all = null;
    fwrite($fp, "close" . PHP_EOL);
    fclose($fp);

}