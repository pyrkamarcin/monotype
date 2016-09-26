<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DirectControllServerCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('dc:server')
            ->setDescription('Run loopback socket 127.0.0.1:4001 test server with multiple connection');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return Repeater
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start socket server');

        $loop = \React\EventLoop\Factory::create();
        $socket = new \React\Socket\Server($loop);

        $socket->on('connection', function ($conn) {
            echo 'New client !';

            $conn->on('data', function ($data) use ($conn) {
                $conn->write($data);
            });
        });

        $socket->listen(4001);

        $loop->run();

    }
}
