<?php

namespace Monotype\Bundle\GUIBundle\Command;

use Gui\Application;
use Gui\Components\Button;
use Gui\Components\TextArea;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GuiStartCommand
 * @package Monotype\Bundle\GUIBundle\Command
 */
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

            $button = (new Button())
                ->setLeft(40)
                ->setTop(100)
                ->setWidth(200)
                ->setValue('RUN');

            $field = (new TextArea())
                ->setLeft(40)
                ->setTop(200)
                ->setWidth(500)
                ->setVisible(false);

            $button->on('click', function () use ($button, $field) {

                $field->setVisible(true);
                $field->setValue($field->getValue() . mt_rand(0, 10));

            });

        });
        $application->run();

        return true;
    }
}
