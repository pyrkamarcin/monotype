<?php

namespace Monotype\Utils;

/**
 * Class ServerCommand
 * @package Monotype\Utils
 */
class ServerCommand extends Command
{
    public function close($client)
    {
        $client->close();
        die();
    }

    public function test()
    {
        echo 'this is only simple test' . PHP_EOL;
    }
}
