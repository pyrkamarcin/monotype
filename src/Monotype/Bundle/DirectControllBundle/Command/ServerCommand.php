<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ServerCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class ServerCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('server')
            ->setDescription('Run loopback socket 127.0.0.1:4001 test server with multiple connection');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start socket server');

        $loop = \React\EventLoop\Factory::create();
        $socket = new \React\Socket\Server($loop);
        $http = new \React\Http\Server($socket, $loop);

        $http->on('request', function ($request, $response) {
            $response->writeHead(200, array('Content-Type' => 'text/plain'));
            $response->end("Hello World\n");
        });
        echo "Server running at http://127.0.0.1:4001\n";

        $socket->listen(4001, '0.0.0.0');
        $loop->run();
    }
}
