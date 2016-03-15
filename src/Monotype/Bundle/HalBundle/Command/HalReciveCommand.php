<?php

namespace Monotype\Bundle\HalBundle\Command;

use Monotype\Domain\Hal\Connector;
use Monotype\Domain\Hal\Machine;
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

        $machine = new Machine($input->getArgument('machine'));
        $connector = new Connector($machine);

//        dump($connector);
        $connector->open();


        $output->writeln('...');
    }
}
