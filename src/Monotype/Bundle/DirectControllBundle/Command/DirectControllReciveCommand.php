<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Bundle\DirectControllBundle\Entity\Stocks;
use Monotype\Domain\Hal\Machine;
use Monotype\Domain\Hal\Reactor;
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

        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');

        $machine = new Machine($input->getArgument('machine'));
        $reactor = new Reactor($machine);

        $output->writeln('Connection start...');

        $stocks = new Stocks();

        $stocks->setHash($reactor->stock->stock->getUniqId());
        $stocks->setFile($reactor->stock->stock->getPath());
        $stocks->setDatetime(new \DateTime('now'));

        $entityManager->persist($stocks);
        $entityManager->flush();

        $reactor->on();
        $reactor->run();

        return true;
    }
}
