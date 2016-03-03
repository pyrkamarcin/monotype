<?php

namespace Monotype\Bundle\HalBundle\Command;

use Monotype\Bundle\HalBundle\Utils\Deamon;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HalAddListnerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('hal:add:listner')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }

        $listner = new Deamon;
        $listner_pid = $listner->addListner();

        $output->writeln('result.:' . $listner_pid);
    }

}
