<?php
require_once 'bootstrap.php';

$manager = new \Monotype\Domain\Bowman\ProcessManager();
$manager
    ->add(new \Symfony\Component\Process\Process('START /B ping google.com -n 5'))
//    ->add(new \Symfony\Component\Process\Process('START /B tree'))
//    ->add(new \Symfony\Component\Process\Process('START /B dir'))
//    ->add(new \Symfony\Component\Process\Process('START /B ping wp.com -n 10'))
    ->run();
