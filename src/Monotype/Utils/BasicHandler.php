<?php

namespace Monotype\Utils;

use Symfony\Component\HttpFoundation\Session\Session;

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

    public function createFile()
    {
        $session = new Session();
        $actualTimestamp = microtime($get_as_float = true);
        $path = __DIR__ . '/../../../var/temp/stock';

        if ($actualTimestamp - $session->get('timestamp') >= 0.75) {
            $name = tempnam($path, '_');
            $session->set('tempname', $name);
            file_put_contents($name, $this->message, FILE_APPEND);
            $session->set('timestamp', $actualTimestamp);
            $this->io->block('create file');
        } else {
            $session->set('timestamp', $actualTimestamp);
            file_put_contents($session->get('tempname'), $this->message, FILE_APPEND);
            $this->io->block('added to the existing');
        }
    }
}
