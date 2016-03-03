<?php

error_reporting(E_ALL);

require_once "app/autoload.php";

$supervisor = new \Supervisor\Supervisor('Server #1', '127.0.0.1', 'user', '123', '9001');

//var_dump($supervisor);
//var_dump($supervisor->checkConnection());

$processes = $supervisor->getProcesses();

foreach ($processes as $process) {
    // ...
    echo $process->getName();
    // ...
}
