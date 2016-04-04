<?php

namespace Monotype\Bundle\HalBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class ProcessTestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('process:test')
            ->setDescription('Run test bash process');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $process = new Process('watch df -h');
        $process->start();

        $pid = $process->getPid();

        $output->writeln('Command result:');
        $output->writeln('PID: ' . $pid . PHP_EOL);
    }
}
