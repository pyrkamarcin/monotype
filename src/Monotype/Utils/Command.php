<?php

namespace Monotype\Utils;

/**
 * Class Command
 * @package Monotype\Utils
 */
class Command
{
    /**
     * @var
     */
    private $client;

    /**
     * Command constructor.
     * @param $client
     * @param $command
     */
    public function __construct($client, $command)
    {
        $this->{$command}($client);
    }

    /**
     *
     */
    private function close($client)
    {
        $client->close();
        die();
    }

    private function test()
    {
        echo 'this is only simple test' . PHP_EOL;
    }
}
