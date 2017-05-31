<?php

require __DIR__ . '/vendor/autoload.php';

$process = new \Symfony\Component\Process\Process('php bin/monotype server:run', null, null, null, $timeout = 99999999);
$process->start();

foreach ($process as $type => $data) {
    if ($process::OUT === $type) {
        echo "\nRead from stdout: " . $data;
    } else { // $process::ERR === $type
        echo "\nRead from stderr: " . $data;
    }
}