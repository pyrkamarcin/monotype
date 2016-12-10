<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DirectControllServerCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('dc:server')
            ->setDescription('Run loopback socket 127.0.0.1:4001 test server with multiple connection');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start socket server');

        $loop = \React\EventLoop\Factory::create();
        $socket = new \React\Socket\Server($loop);


        $app = function ($request, $response) {
            $response->writeHead(200, array('Content-Type' => 'text/plain'));
            $response->end("Hello World\n");
        };

        $loop = \React\EventLoop\Factory::create();
        $socket = new \React\Socket\Server($loop);
        $http = new \React\Http\Server($socket, $loop);

        $http->on('request', $app);
        echo "Server running at http://127.0.0.1:4001\n";

        $socket->listen(4001);
        $loop->run();
    }
}
