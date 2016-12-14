<?php

namespace Monotype\Utils;

use React\Datagram\Socket;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ServerCommand
 * @package Monotype\Utils
 */
class ServerCommand extends Command
{
    public function close(SymfonyStyle $io, Socket $client)
    {
        $io->warning('Server stopped.');
        $client->close();
        die();
    }

    public function test(SymfonyStyle $io)
    {
        $io->caution('This is only simple test.');
    }
}
