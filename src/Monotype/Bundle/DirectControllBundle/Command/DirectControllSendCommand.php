<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Hal\Machine;
use Monotype\Domain\Hal\Sender;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DirectControllSendCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class DirectControllSendCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('dc:send')
            ->setDescription('...')
            ->addArgument('machine', InputArgument::REQUIRED, 'Machine ID')
            ->addArgument('data', InputArgument::OPTIONAL, 'Data')
            ->addOption('file', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return boolean
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('file')) {
            $data = file_get_contents($input->getArgument('data'));
        } else {
            $data = $input->getArgument('data');
        }

        $output->writeln('Connection start...');

        $reactor = new Sender(new Machine($input->getArgument('machine')));
        $reactor->send($data);
        // lub
        // $reactor->sendAsReact($data);

        return true;
    }
}
