<?php

namespace Monotype\Bundle\DirectControllBundle\Command;

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


        $fp = stream_socket_client('udp://127.0.0.1:4001', $errno, $errstr);
        if (!$fp) {
            echo "ERROR: $errno - $errstr<br />\n";
        } else {
            fwrite($fp, 'testdata', 8);
            fclose($fp);
        }

//        if ($input->getOption('file')) {
//            $data = file_get_contents($input->getArgument('data'));
//        } else {
//            $data = $input->getArgument('data');
//        }
//
//        $output->writeln('Connection start...');
//
//        $reactor = new Sender(new Machine([
//            'id' => '1',
//            'name' => 'test',
//            'protocol' => 'udp',
//            'address' => '127.0.0.1',
//            'port' => '4001',
//            'location' => 'main'
//        ]));
//
//        $reactor->sendAsReact('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae vulputate lacus. Quisque ante arcu, blandit rutrum lacus at, pulvinar luctus ligula. Quisque at est lacus. Nulla sollicitudin mi vel lobortis mollis. Quisque malesuada, arcu at condimentum maximus, leo nunc euismod neque, efficitur bibendum velit quam sed quam. Nulla sodales diam turpis. Aliquam fermentum quis orci a rhoncus. Duis libero quam, scelerisque quis aliquam nec, ultrices a metus. Aenean condimentum erat id justo luctus dictum. Vivamus ac orci magna. Suspendisse dictum eu mauris et porta. Pellentesque efficitur vestibulum egestas. Nullam maximus, tellus ut molestie venenatis, leo mauris ullamcorper magna, sed convallis nunc elit et ex. Curabitur vel neque interdum, elementum odio elementum, dictum quam. Cras imperdiet elit augue, eget tempor dolor finibus non. Vivamus dui purus, ullamcorper eu velit vel, interdum tincidunt arcu. Suspendisse sed augue nec urna laoreet ornare. Morbi sed laoreet ligula. Cras auctor finibus odio, vel pretium augue dapibus id. Duis tristique urna sodales nibh scelerisque mollis ut vel felis. Duis at urna vulputate, feugiat ligula sed, vulputate est. Sed mattis, augue non pretium elementum, purus quam feugiat neque, id finibus justo lorem sit amet dui. Etiam vehicula dignissim nunc, eu ullamcorper purus auctor a.');
    }
}
