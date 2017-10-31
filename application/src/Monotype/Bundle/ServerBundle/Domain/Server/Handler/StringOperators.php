<?php

namespace Monotype\Bundle\ServerBundle\Domain\Server\Handler;

/**
 * Class StringOperators
 * @package Monotype\Bundle\ServerBundle\Domain\Server\Handler
 */
class StringOperators
{

    public function __construct()
    {

    }

    /**
     * @param string $line
     * @return mixed
     */
    public function getFileName(string $line)
    {
        return $this->leftReplace('_', '.', str_replace('%_N_', '', $line));
    }

    /**
     * @param $search
     * @param $replace
     * @param $subject
     * @return mixed
     */
    public function leftReplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);

        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }

        return $subject;
    }

    /**
     * @param string $message
     * @return array|bool
     */
    public function getTwoFirstLines(string $message)
    {
        $array = explode("\n", $message);
        if (count($array) >= 2) {
            return [0 => $array[0], 1 => $array[1]];
        } else {
            return false;
        }
    }

    /**
     * @param string $line
     * @return mixed
     */
    public function getPath(string $line)
    {
        return str_replace('_', '.', str_replace(['_N_', ';$PATH='], '', $line));
    }
}
