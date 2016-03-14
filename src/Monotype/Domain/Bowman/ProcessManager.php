<?php

namespace Monotype\Domain\Bowman;

use Symfony\Component\Process\Process;

/**
 * Class ProcessManager
 * @package Monotype\Domain\Bowman
 */
class ProcessManager implements ProcessManagerInterface
{
    /**
     * @param Process $process
     * @return bool
     */
    public static function init(Process $process)
    {
        return true;
    }

    /**
     * @param Process $process
     * @return bool
     */
    public static function start(Process $process)
    {
        return true;
    }

    /**
     * @param Process $process
     * @return bool
     */
    public static function stop(Process $process)
    {
        return true;
    }
}
