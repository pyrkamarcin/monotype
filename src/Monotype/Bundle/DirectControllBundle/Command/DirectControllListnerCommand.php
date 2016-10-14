<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Connector;
use Monotype\Domain\Machine;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DirectControllListnerCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class DirectControllListnerCommand extends ContainerAwareCommand
{
    protected $em;

    protected function configure()
    {
        $this
            ->setName('dc:listner')
            ->setDescription('...')
            ->addArgument('machine', InputArgument::REQUIRED, 'Machine ID')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Exception
     * @return boolean
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('option')) {
            // ...
        }

        $machine = new Machine($input->getArgument('machine'));
        $socket = new Connector\Socket($machine->getProtocol(), $machine->getAddress(), $machine->getPort());
        $socket->openStream();

        while (!feof($socket->socket)) {
            $contents = $socket->read(1);
            echo $contents;
        }

        return true;
    }
}
