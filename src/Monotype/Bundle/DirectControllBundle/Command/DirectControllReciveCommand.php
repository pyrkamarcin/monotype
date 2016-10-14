<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Machine;
use Monotype\Domain\Path;
use Monotype\Domain\Reactor;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DirectControllReciveCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class DirectControllReciveCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('dc:recive')
            ->setDescription('...')
            ->addArgument('machine', InputArgument::REQUIRED, 'Machine ID')
            ->addArgument('path', InputArgument::REQUIRED, 'File path')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return boolean
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('option')) {
            //
        }

        /**
         * @TODO: Wyłączyłem zapis w bazie o dodawaniu czegoś przez stocks. Całe trzeba wyrzucić i loger z prawdziwego zdarzenia zrobić.
         */

//        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
//        $stocks = new Stocks();
//
//        $stocks->setHash($reactor->stock->stock->getUniqId());
//        $stocks->setFile($reactor->stock->stock->getPath());
//        $stocks->setDatetime(new \DateTime('now'));
//
//        $entityManager->persist($stocks);
//        $entityManager->flush();

        $output->writeln('Connection start...');

        $reactor = new Reactor(
            new Machine($input->getArgument('machine')),
            new Path($input->getArgument('path')));

        $reactor->on();
        $reactor->run();

        return true;
    }
}
