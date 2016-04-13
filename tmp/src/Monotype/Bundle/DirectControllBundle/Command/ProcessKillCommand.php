<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

/**
 * Class ProcessKillCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class ProcessKillCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('process:kill')
            ->setDescription('Kill process')
            ->addArgument('pid', InputArgument::REQUIRED, 'PID');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $find = new Process('ps -p ' . $input->getArgument('pid') . ' -o comm=');
        $find->run();

        if (!empty($find->getOutput())) {
            $process = new Process('kill ' . $input->getArgument('pid') . PHP_EOL);
            $process->start();

            $output->writeln('Process ' . $input->getArgument('pid') . ' was killed.');
        } else {
            $output->writeln('Don\'t find process by PID');
        }

        return true;
    }
}
