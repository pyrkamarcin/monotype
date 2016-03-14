<?php

namespace Monotype\Domain\Bowman;

use Symfony\Component\Process\Process;

/**
 * Interface ProcessManagerInterface
 * @package Monotype\Domain\Bowman
 */
interface ProcessManagerInterface
{
    /**
     * @param Process $process
     * @return mixed
     */
    public static function init(Process $process);

    /**
     * @param Process $process
     * @return mixed
     */
    public static function start(Process $process);

    /**
     * @param Process $process
     * @return mixed
     */
    public static function stop(Process $process);
}
