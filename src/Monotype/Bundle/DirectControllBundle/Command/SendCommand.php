<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

use Monotype\Domain\Model\Machine;
use Monotype\Domain\Server\Sender;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SendCommand
 * @package Monotype\Bundle\DirectControllBundle\Command
 */
class SendCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('send')
            ->setDescription('...')
            ->addArgument('data', InputArgument::OPTIONAL, 'Data')
            ->addOption('file', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('file')) {
            $data = file_get_contents($input->getArgument('data'));
        } else {
            $data = $input->getArgument('data');
        }

        $output->writeln('Connection start...');

        $reactor = new Sender(new Machine([
            'id' => '1',
            'name' => 'test',
            'protocol' => 'tcp',
            'address' => '192.168.0.114',
            'port' => '4001',
            'location' => 'main'
        ]));

        $reactor->sendAsReact($data);
    }
}
