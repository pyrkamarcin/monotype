<?php

namespace Monotype\Server\Command;

use Monotype\Server\Command;
use React\Datagram\Socket;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ServerCommand
 * @package Monotype\Server\Command
 */
class ServerCommand extends Command
{
    /**
     * @param SymfonyStyle $inputOutput
     * @param Socket $client
     */
    public function close(SymfonyStyle $inputOutput, Socket $client)
    {
        $inputOutput->warning('Server stopped.');
        $client->close();
        die();
    }

    /**
     * @param SymfonyStyle $inputOutput
     */
    public function test(SymfonyStyle $inputOutput)
    {
        $inputOutput->caution('This is only simple test.');
    }
}
