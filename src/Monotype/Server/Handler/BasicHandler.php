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
    public function dumpMessage()
    {
        $this->io->text('received message (' . strlen($this->message) . ') "' . $this->message . '" from ' . $this->serverAddress);
    }

    /**
     *
     */
    public function createFile()
    {
        $session = new Session();
        $actualTimestamp = microtime($get_as_float = true);
        $path = new Path(['location' => __DIR__ . '/../../../../var/temp/stock']);

        if ($actualTimestamp - $session->get('timestamp') >= 0.85) {
            $name = tempnam($path->getLocation(), sha1($this->serverAddress) . '_');
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

    /**
     * @return array|bool
     */
    public function getTwoFirstLines()
    {
        $array = explode("\n", $this->message);
        if (count($array) >= 2) {
            return [0 => $array[0], 1 => $array[1]];
        } else {
            return false;
        }
    }

    /**
     * @param string $line
     * @return bool|mixed
     */
    public function getFileName(string $line)
    {
        if (strpos($line, '%_N_')) {

            $data = explode('%_N_', $line);

            if (is_array($data)) {
                return $this->str_lreplace('_', '.', $data[1]);
            }
        } else {
            return false;
        }
    }

    /**
     * @param $search
     * @param $replace
     * @param $subject
     * @return mixed
     */
    private function str_lreplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);

        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }

        return $subject;
    }
}
