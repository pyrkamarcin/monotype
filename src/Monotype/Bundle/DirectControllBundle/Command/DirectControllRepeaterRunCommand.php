<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Server\Repeater;
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
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
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
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start socket server');

        $repeater = new Repeater('0.0.0.0', '4001');
        $repeater->run();

        return true;
    }
}
