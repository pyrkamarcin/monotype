<?php

namespace Monotype\Bundle\ServerBundle\Command;

use React\Datagram;
use React\Dns\Resolver;
use React\EventLoop;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ServerSendCommand
 * @package Monotype\Bundle\ServerBundle\Command
 */
class ServerSendCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('server:send')
            ->setDescription('Send test data to server or devices')
            ->addArgument('address', InputArgument::REQUIRED, 'address')
            ->addArgument('port', InputArgument::REQUIRED, 'port')
            ->addArgument('name', InputArgument::OPTIONAL, 'name')
            ->addArgument('file', null, InputArgument::OPTIONAL, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputOutput = new SymfonyStyle($input, $output);

        $address = $input->getArgument('address');
        $port = $input->getArgument('port');
        $name = $input->getArgument('name');
        $file = $input->getArgument('file');

        $loop = EventLoop\Factory::create();
        $factory = new Resolver\Factory();

        $resolver = $factory->createCached('8.8.8.8', $loop);
        $factory = new Datagram\Factory($loop, $resolver);

        $factory->createClient($address . ':' . $port)->then(function (Datagram\Socket $client) use ($loop, $name, $file, $inputOutput) {

            $inputOutput->note(__DIR__);

            if ($file) {
                $client->send(file_get_contents(__DIR__ . '/../../../../../' . $file));
            } else {
                $client->send($name);
            }
            $inputOutput->success('Send.');
            $client->end();
        }, function ($error) use ($inputOutput) {
            $inputOutput->error('ERROR: ' . $error->getMessage());
        });

        $loop->run();
    }
}
