<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Model\Machine;
use Monotype\Domain\Model\Path;
use Monotype\Domain\Reactor;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReciveCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class ReciveCommand extends ContainerAwareCommand
{

    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('recive')
            ->setDescription('...')
            ->addArgument('machine', InputArgument::OPTIONAL, 'Machine ID')
            ->addArgument('path', InputArgument::OPTIONAL, 'File path')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Connection start...');

        $reactor = new Reactor(
            new Machine(['id' => '1',
                'name' => 'test',
                'protocol' => 'tcp',
                'address' => '192.168.100.113',
                'port' => '4001',
                'location' => 'main']),
            new Path(['location' => __DIR__ . '/tmp.txt']));

        $reactor->on();
        $reactor->run();
    }
}
