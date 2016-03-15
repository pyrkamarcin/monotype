<?php

namespace Monotype\Domain\Hal\Connector;

class Rod
{
    public static function parse($string)
    {

        $commands = array(
            'close' => 'close',
            'help' => 'help'
        );

        if ($row = array_search($string, $commands)) {
            return $commands[$row];
        }
    }
}
