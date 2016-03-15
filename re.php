<?php

require_once 'bootstrap.php';

$reactor = new \Monotype\Domain\Hal\Reactor(new \Monotype\Domain\Hal\Machine('0'));
$reactor->listen();

$reactor->on();
$reactor->run();
