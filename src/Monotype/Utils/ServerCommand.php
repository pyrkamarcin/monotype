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
    /**
     * @param SymfonyStyle $io
     * @param Socket $client
     */
    public function close(SymfonyStyle $io, Socket $client)
    {
        $io->warning('Server stopped.');
        $client->close();
        die();
    }

    /**
     * @param SymfonyStyle $io
     */
    public function test(SymfonyStyle $io)
    {
        $io->caution('This is only simple test.');
    }
}
