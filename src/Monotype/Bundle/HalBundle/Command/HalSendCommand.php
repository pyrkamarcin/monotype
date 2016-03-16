<?php

namespace Monotype\Bundle\HalBundle\Command;

use Monotype\Domain\Hal\Machine;
use Monotype\Domain\Hal\Reactor;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HalSendCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('hal:send')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::REQUIRED, 'Machine ID')
            ->addArgument('data', InputArgument::OPTIONAL, 'Data')
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
        $reactor->write($input->getArgument('machine'));
        $reactor->run();
    }
}
