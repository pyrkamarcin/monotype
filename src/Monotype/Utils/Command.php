<?php

namespace Monotype\Utils;

/**
 * Class Command
 * @package Monotype\Utils
 */
class Command
{
    /**
     * Command constructor.
     * @param $client
     * @param $command
     */
    public function __construct($client, $command)
    {
        if (method_exists($this, $command)) {
            $this->{$command}($client);
        } else {
            echo 'nie znaleziono funkcji' . PHP_EOL;
        }
    }
}
