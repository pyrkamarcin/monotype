<?php

namespace Monotype\Utils;

use React\Datagram\Socket;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class Command
 * @package Monotype\Utils
 */
class Command
{
    public $io;
    public $client;
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
    }
}
