<?php

namespace Monotype\Bundle\HalBundle\Command;

use Monotype\Domain\Hal\Connector;
use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Machine;
use Monotype\Domain\Hal\Reactor;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HalReciveCommand
 * @package Monotype\Bundle\HalBundle\Command
 */
class HalReciveCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('hal:recive')
            ->setDescription('...')
            ->addArgument('machine', InputArgument::REQUIRED, 'Machine ID')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('option')) {
            // ...
        }

        $output->writeln('Connection start...');

        $reactor = new Reactor(new Machine($input->getArgument('machine')));
        $reactor->listen();
        $reactor->on();
        $reactor->run();
    }
}
