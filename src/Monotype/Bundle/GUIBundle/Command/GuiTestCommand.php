<?php

namespace Monotype\Bundle\GUIBundle\Command;

use Gui\Application;
use Gui\Components\Button;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GuiTestCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('gui:test')
            ->setDescription('Start GUI simple test window.');
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
            $button = (new Button())
                ->setLeft(40)
                ->setTop(100)
                ->setWidth(200)
                ->setValue('Look, I\'m a button!');

            $button->on('click', function () use ($button) {
                $button->setValue('Look, I\'m a clicked button!');
            });
        });
        $application->run();

        return true;
    }
}
