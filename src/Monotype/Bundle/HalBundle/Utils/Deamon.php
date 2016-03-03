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
        $process = new Process('START /B ping google.com -n 10');
        $process->setTimeout(3600);
        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                echo 'ERR > ' . $buffer;
            } else {
                echo 'OUT > ' . $buffer;
            }
        });
        echo $process->getPid();
        echo $process->getOutput();
//        $process->wait(function ($type, $buffer) {
//            if (Process::ERR === $type) {
//                echo 'ERR > ' . $buffer;
//            } else {
//                echo 'OUT > ' . $buffer;
//            }
//        });
    }
}
