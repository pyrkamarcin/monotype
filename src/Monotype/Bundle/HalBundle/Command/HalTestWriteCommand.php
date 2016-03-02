<?php

namespace Monotype\Bundle\HalBundle\Command;

use Monotype\Bundle\HalBundle\Utils\Serial;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HalTestWriteCommand
 * @package Monotype\Bundle\HalBundle\Command
 */
class HalTestWriteCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('hal:test:write')
            ->setDescription('...')
            ->addArgument('device', InputArgument::REQUIRED, 'Device address')
            ->addArgument('baudRate', InputArgument::OPTIONAL, 'BaudRate')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $device = $input->getArgument('device');
        $baudRate = $input->getArgument('baudRate');

        if ($input->getOption('option')) {
            // ...
        }


//        $serial = new Serial();
//        $serial->deviceSet($device);
//        $serial->confBaudRate($baudRate ? $baudRate : 9600);
//
//        $serial->confParity("none");
//        $serial->confCharacterLength(8);
//        $serial->confStopBits(1);
//        $serial->confFlowControl("none");
//
////        dump($serial);
//
//        $serial->deviceOpen();
//
//        $serial->sendMessage("Hello World!");
//
//        $serial->deviceClose();

        $output->writeln('Command result.');
    }
}
