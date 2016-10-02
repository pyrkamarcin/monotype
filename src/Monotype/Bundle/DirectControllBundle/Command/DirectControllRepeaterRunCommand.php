<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Hal\Tools\Repeater;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DirectControllRepeaterRunCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class DirectControllRepeaterRunCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('dc:repeater:run')
            ->setDescription('Run loopback socket 0.0.0.0:4001 test server with multiple connection');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return Repeater
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start socket server');

        return new Repeater('0.0.0.0', '4001');
    }
}
