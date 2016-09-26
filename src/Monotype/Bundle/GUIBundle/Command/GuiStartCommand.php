<?php

namespace Monotype\Bundle\GUIBundle\Command;

use Gui\Application;
use Gui\Components\Button;
use Gui\Components\TextArea;
use Monotype\Domain\Hal\Connector;
use Monotype\Domain\Hal\Machine;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GuiStartCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('gui:start')
            ->setDescription('Start application graphics interface.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $application = new Application([
            'title' => 'My PHP Desktop Application',
            'left' => 248,
            'top' => 50,
            'width' => 600,
            'height' => 400
        ]);

        $application->on('start', function () use ($application) {

            $field = (new TextArea())
                ->setLeft(40)
                ->setTop(200)
                ->setWidth(500);

            $button = (new Button())
                ->setLeft(40)
                ->setTop(100)
                ->setWidth(200)
                ->setValue('RUN');

            $button->on('click', function () use ($button, $field) {

                $machine = new Machine(1);
                $socket = new Connector\Socket($machine->getProtocol(), $machine->getAddress(), $machine->getPort());
                $socket->openStream();

                while (!feof($socket->socket)) {
                    $contents = $socket->read(1);
                    $field->setValue($contents);
                }

            });

        });
        $application->run();

        return true;
    }
}
