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
        $process = new Process('START /B ping 127.0.0.1 -n 200');
        $process->setTimeout(3600);
        $process->run();
        echo $process->getPid();

        $process->wait(function ($type, $buffer) {
            if (Process::ERR === $type) {
                echo 'ERR > ' . $buffer;
            } else {
                echo 'OUT > ' . $buffer;
            }
        });
    }
}
