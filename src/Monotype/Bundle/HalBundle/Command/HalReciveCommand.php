<?php

namespace Monotype\Bundle\HalBundle\Command;

use Monotype\Bundle\BowmanBundle\Entity\Stocks;
use Monotype\Domain\Hal\Connector;
use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Machine;
use Monotype\Domain\Hal\Reactor;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HalReciveCommand
 * @package Monotype\Bundle\HalBundle\Command
 */
class HalReciveCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('hal:recive')
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
