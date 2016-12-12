<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\RandomString;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SendCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class SendCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('send')
            ->setDescription('...')
            ->addArgument('port', InputArgument::OPTIONAL, 'port')
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
        $port = $input->getArgument('port');
        $length = $input->getArgument('length');

        $loop = \React\EventLoop\Factory::create();
        $factory = new \React\Dns\Resolver\Factory();

        $resolver = $factory->createCached('8.8.8.8', $loop);
        $factory = new \React\Datagram\Factory($loop, $resolver);

        $factory->createClient('localhost:' . $port)->then(function (\React\Datagram\Socket $client) use ($loop, $length) {
            $client->send(RandomString::generate($length));
            $client->end();
        }, function ($error) {
            echo 'ERROR: ' . $error->getMessage() . PHP_EOL;
        });

        $loop->run();
    }
}
