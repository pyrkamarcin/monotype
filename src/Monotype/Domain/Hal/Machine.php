<?php

namespace Monotype\Domain\Hal;

/**
 * Class Machine
 * @package Monotype\Domain\Hal
 */
class Machine extends Device
{
    /**
     * Machine constructor.
     * @param $id
     */
    public function __construct($id)
    {
        parent::__construct($id);
    }
}
