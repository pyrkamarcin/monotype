<?php

namespace Monotype\Bundle\HalBundle\Utils;

use Symfony\Component\Process\Process;

class Deamon
{
    public function __construct()
    {
    }

    public function addListner()
    {
        $process = new Process('sleep 10');
        $process->start();

        $pid = $process->getPid();

        return $pid;
    }
}
