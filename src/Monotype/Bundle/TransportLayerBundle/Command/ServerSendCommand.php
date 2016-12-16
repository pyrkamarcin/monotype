<?php

namespace Monotype\Bundle\TransportLayerBundle\Command;

use Monotype\Domain\RandomString;
use React\Datagram;
use React\Dns\Resolver;
use React\EventLoop;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


/**
 * Class ServerSendCommand
 * @package Monotype\Bundle\TransportLayerBundle\Command
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
            ->setDescription('...')
            ->addArgument('address', InputArgument::REQUIRED, 'address')
            ->addArgument('port', InputArgument::REQUIRED, 'port')
            ->addArgument('length', InputArgument::OPTIONAL, 'length')
            ->addOption('file', null, InputOption::VALUE_NONE, 'Option description');
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
        $length = $input->getArgument('length');

        $loop = EventLoop\Factory::create();
        $factory = new Resolver\Factory();

        $resolver = $factory->createCached('8.8.8.8', $loop);
        $factory = new Datagram\Factory($loop, $resolver);

        $factory->createClient($address . ':' . $port)->then(function (Datagram\Socket $client) use ($loop, $length, $inputOutput) {
            $client->send(RandomString::generate($length));
            $client->end();
        }, function ($error) use ($inputOutput) {
            $inputOutput->error('ERROR: ' . $error->getMessage());
        });

        $loop->run();
    }
}
