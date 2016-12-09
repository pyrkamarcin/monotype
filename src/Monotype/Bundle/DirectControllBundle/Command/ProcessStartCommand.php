<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

/**
 * Class ProcessStartCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class ProcessStartCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
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
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     * @throws \Symfony\Component\Process\Exception\LogicException
     * @throws \Symfony\Component\Process\Exception\RuntimeException
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
