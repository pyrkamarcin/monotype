<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Connector\Socket;
use Monotype\Domain\Model\Machine;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ListnerCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class ListnerCommand extends ContainerAwareCommand
{
    /**
     * @var
     */
    protected $em;

    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('listner')
            ->setDescription('...')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $machine = new Machine([
            'id' => '1',
            'name' => 'test',
            'protocol' => 'tcp',
            'address' => '192.168.0.58',
            'port' => '4001',
            'location' => 'main'
        ]);

        $socket = new Socket($machine->getProtocol(), $machine->getAddress(), $machine->getPort());
        $socket->openStream();

        while (!feof($socket->socket)) {
            $contents = $socket->read(1);
            echo $contents;
        }
    }
}
