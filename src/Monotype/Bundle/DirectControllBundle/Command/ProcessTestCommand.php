<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

/**
 * Class ProcessTestCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class ProcessTestCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('process:test')
            ->setDescription('Run test bash process');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $process = new Process('watch df -h');
        $process->start();

        $pid = $process->getPid();

        $output->writeln('Command result:');
        $output->writeln('PID: ' . $pid . PHP_EOL);

        return true;
    }
}
