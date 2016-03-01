<?php

$fp = stream_socket_client("192.168.100.101:4001", $errno, $errstr, 4001);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {

    $contents = null;
    $all = null;

    while (!feof($fp)) {
        $contents = fread($fp, 4);
        $all .= $contents;

        echo $contents;
    }
    fclose($fp);
}
