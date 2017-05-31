<?php

require __DIR__ . '/vendor/autoload.php';

use Gui\Application;
use Gui\Components\Button;
use Gui\Components\Label;
use Gui\Output;
use Symfony\Component\Process\Process;

$application = new Application();

$application->on('start', function () use ($application) {

    $input = (new Label())
        ->setFontSize(20)
        ->setLeft(90)
        ->setText('Basic Example')
        ->setTop(10);

    $button = (new Button())
        ->setLeft(40)
        ->setTop(100)
        ->setWidth(200)
        ->setValue('Start server');

    $button->on('click', function () use ($button, $input) {

        $button->setValue('Starting...');


        $process = new Process('php bin/monotype server:run', null, null, null, $timeout = 99999999);
        $process->start();

        echo sprintf('Crunching numbers in process %d', $process->getPid());

        $button->setValue('Started');
        file_put_contents('pid', $process->getPid());


        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                echo "\nRead from stdout: " . $data;
//                $input->setValue($data);
                Output::out('Speed: ' . $data . ' messages/sec', 'red');
            } else { // $process::ERR === $type
                echo "\nRead from stderr: " . $data;
            }
        }


        echo "\nDone.\n";

    });

//    $button_stop = (new Button())
//        ->setLeft(40)
//        ->setTop(150)
//        ->setWidth(200)
//        ->setValue('Stop server');
//
//    $button_stop->on('click', function () use ($button, $button_stop) {
//
//        $pid = file_get_contents('pid');
//
//        $process = Process::createFromPID($pid);
//        $process->isRunning(); // -> true
//        $process->stop();
//
//        $button_stop->setValue('Stop...');
//        $button->setValue('Start server');
//
//
//    });
});

$application->run();
