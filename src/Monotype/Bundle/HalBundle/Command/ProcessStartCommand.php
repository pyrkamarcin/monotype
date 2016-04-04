<?php

namespace Monotype\Bundle\HalBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

/**
 * Class ProcessStartCommand
 * @package Monotype\Bundle\HalBundle\Command
 */
class ProcessStartCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('process:start')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::REQUIRED, 'Command');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $process = new Process($input->getArgument('argument'));
        $process->start();

        $pid = $process->getPid();

        $output->writeln('Command "' . $input->getArgument('argument') . '" result:');
        $output->writeln('PID: ' . $pid . PHP_EOL);

        return true;
    }
}
