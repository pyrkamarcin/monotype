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
use Doctrine\ORM\EntityManager;

/**
 * Class HalListnerCommand
 * @package Monotype\Bundle\HalBundle\Command
 */
class HalListnerCommand extends ContainerAwareCommand
{
    protected $em;

    protected function configure()
    {
        $this
            ->setName('hal:Listner')
            ->setDescription('...')
            ->addArgument('machine', InputArgument::REQUIRED, 'Machine ID')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('option')) {
            // ...
        }

//        $this->em = $this->getContainer()->get('doctrine.orm.entity_manager');

//        $reactor = new Reactor(new Machine($input->getArgument('machine')));

//        $stocks = new Stocks();
//        $stocks->setHash($reactor->stock->stock->getUniqId());
//
//        $stocks->setFile($reactor->stock->stock->getPath());
//        $stocks->setDatetime(new \DateTime('now'));
//
//        $this->em->persist($stocks);
//        $this->em->flush();

//        $output->writeln('Connection start...');

//        $reactor->on();
//        $reactor->run();



        $machine = new Machine($input->getArgument('machine'));
        $socket = new Connector\Socket($machine->getProtocol(), $machine->getAddress(), $machine->getPort());
        $socket->openStream();

        while (!feof($socket->socket)) {
            $contents = $socket->read(16);

            $dump = new Dumper(new Dumper\Stock());
            $dump->stockize($contents);
            echo $contents;
        }
    }
}
