<?php

namespace Monotype\Utils;

/**
 * Class BasicHandler
 * @package Monotype\Utils
 */
class BasicHandler extends Handler
{
    /**
     *
     */
    public function dumpMessage()
    {
        $this->io->text('received message (' . strlen($this->message) . ') "' . $this->message . '" from ' . $this->serverAddress);
    }
}
