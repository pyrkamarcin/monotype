<?php

namespace Monotype\Server;

use React\Datagram\Socket;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class Command
 * @package Monotype\Server
 */
class Command
{
    /**
     * @var
     */
    public $io;
    /**
     * @var
     */
    public $client;
    /**
     * @var
     */
    public $command;

    /**
     * Command constructor.
     * @param SymfonyStyle $io
     * @param Socket $client
     * @param string $command
     */
    public function __construct(SymfonyStyle $io, Socket $client, string $command)
    {
        if (method_exists($this, $command)) {
            $this->{$command}($io, $client);
        } else {
            $io->warning('nie znaleziono funkcji');
        }
        $this->summary();
    }

    /**
     * @return bool
     */
    private function summary()
    {
        return true;
    }
}
