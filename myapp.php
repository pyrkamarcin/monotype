<?php

require __DIR__ . '/vendor/autoload.php';

use Cocur\BackgroundProcess\BackgroundProcess;
use Gui\Application;
use Gui\Components\Button;

$application = new Application();

$application->on('start', function () use ($application) {
    $button = (new Button())
        ->setLeft(40)
        ->setTop(100)
        ->setWidth(200)
        ->setValue('Start server');

    $button->on('click', function () use ($button) {

        $button->setValue('Starting...');

        $process = new BackgroundProcess('php bin/monotype server:run');
        $process->run();

        echo sprintf('Crunching numbers in process %d', $process->getPid());
        echo "\nDone.\n";

        file_put_contents('pid', $process->getPid());
    });

    $button_stop = (new Button())
        ->setLeft(40)
        ->setTop(150)
        ->setWidth(200)
        ->setValue('Stop server');

    $button_stop->on('click', function () use ($button, $button_stop) {

        $pid = file_get_contents('pid');

        $process = BackgroundProcess::createFromPID($pid);
        $process->isRunning(); // -> true
        $process->stop();

        $button_stop->setValue('Stop...');
        $button->setValue('Start server');


    });
});

$application->run();
