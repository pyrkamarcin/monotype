<?php

namespace Monotype\Server\Handler;

use Monotype\Domain\Model\Path;
use Monotype\Server\Handler;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class BasicHandler
 * @package Monotype\Server\Handler
 */
class BasicHandler extends Handler
{
    /**
     *
     */
    public function createHandler()
    {
        $session = new Session();
        $actualTimestamp = microtime($get_as_float = true);
        $path = new Path(['location' => __DIR__ . '/../../../../var/temp/stock']);

        if ($actualTimestamp - $session->get('timestamp') >= 0.85) {
            $name = tempnam($path->getLocation(), sha1($this->serverAddress) . '_');
            $session->set('tempname', $name);
            file_put_contents($name, $this->message, FILE_APPEND);
            $session->set('timestamp', $actualTimestamp);

            $this->io->block('');
            $this->io->writeln('Get data from: ' . $this->serverAddress);

            $header = StringOperators::getTwoFirstLines($this->message);

            if ($header) {
                $fileName = StringOperators::getFileName($header[0]);
                $this->io->writeln('Find filename: ' . $fileName);

                $pathName = StringOperators::getPath($header[1]);
                $this->io->writeln('Find path: ' . $pathName);
            }
            $this->io->write('Create file: .');

        } else {
            $session->set('timestamp', $actualTimestamp);
            file_put_contents($session->get('tempname'), $this->message, FILE_APPEND);
            $this->io->write('.');
        }
    }
}
