<?php

namespace Monotype\Bundle\ServerBundle\Command;

use Monotype\Bundle\ServerBundle\Domain\Server\Server;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ServerRunCommand
 * @package Monotype\Bundle\ServerBundle\Command
 */
class ServerRunCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('server:run')
            ->setDescription('Start local UDP DNC server');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputOutput = new SymfonyStyle($input, $output);

        $inputOutput->title('Monotype (UDP DNC Server)');
        $inputOutput->section('Server started...');

        $server = new Server($inputOutput, '0.0.0.0');
        $server->run();
    }
}
