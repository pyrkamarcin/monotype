<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DirectControllRepeaterCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class DirectControllRepeaterCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('dc:repeater')
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

//        $repeater = new Repeater('0.0.0.0', '4001');
//        $repeater->run();

        $loop = \React\EventLoop\Factory::create();

        $source = new \React\Stream\Stream(fsockopen('omg.txt', 'r'), $loop);
        $dest = new \React\Stream\Stream(fopen('wtf.txt', 'w'), $loop);

        $source->pipe($dest);

        $loop->run();


        return true;
    }
}
