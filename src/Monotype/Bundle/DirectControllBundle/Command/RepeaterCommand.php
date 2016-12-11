<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Server\Repeater;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class RepeaterCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class RepeaterCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('repeater')
            ->setDescription('Run loopback socket 0.0.0.0:4001 test server with multiple connection');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start socket server');

        $repeater = new Repeater('192.168.100.113', 4001);
        $repeater->run();
    }
}
