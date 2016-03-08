<?php

namespace Monotype\Bundle\HalBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HalRepeaterRunCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('hal:repeater:run')
            ->setDescription('Run loopback socket 127.0.0.1:4001 test server with multiple connection');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start socket server');

        return new \Monotype\Domain\Hal\Tools\Repeater();
    }
}
