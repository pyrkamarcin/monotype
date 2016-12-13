<?php

namespace Monotype\Bundle\TransportLayerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ServerCommandCommand
 * @package Monotype\Bundle\TransportLayerBundle\Command
 */
class ServerCommandCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('server:command')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $argument = $input->getArgument('argument');

        $loop = \React\EventLoop\Factory::create();
        $factory = new \React\Dns\Resolver\Factory();

        $resolver = $factory->createCached('8.8.8.8', $loop);
        $factory = new \React\Datagram\Factory($loop, $resolver);

        $factory->createClient('0.0.0.0:4000')->then(function (\React\Datagram\Socket $client) use ($argument) {
            $client->send($argument);
            $client->end();
        }, function ($error) {
            echo 'ERROR: ' . $error->getMessage() . PHP_EOL;
        });

        $loop->run();
    }

}
