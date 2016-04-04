<?php

namespace Monotype\Bundle\HalBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class ProcessKillCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('process:kill')
            ->setDescription('Kill process')
            ->addArgument('pid', InputArgument::REQUIRED, 'PID')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $process = new Process('kill ' . $input->getArgument('pid') . PHP_EOL);
        $process->start();

        $output->writeln('Process ' . $input->getArgument('pid') . 'killed.');
    }
}
