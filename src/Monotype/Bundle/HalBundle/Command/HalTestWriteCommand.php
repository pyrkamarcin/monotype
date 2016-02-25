<?php

namespace Monotype\Bundle\HalBundle\Command;

use Monotype\Bundle\HalBundle\Utils\Serial;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HalTestWriteCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('hal:test:write')
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

        $serial = new Serial();
        $serial->deviceSet("COM1");
        $serial->confBaudRate(9600);
        $serial->confParity("none");
        $serial->confCharacterLength(8);
        $serial->confStopBits(1);
        $serial->confFlowControl("rts/cts");

        $serial->deviceClose();
        $serial->deviceOpen();
        $serial->sendMessage("Hello !");

        $serial->deviceClose();

        $output->writeln('Command result.');
    }
}
