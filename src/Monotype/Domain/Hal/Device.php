<?php

namespace Monotype\Domain\Hal;

/**
 * Class Device
 * @package Monotype\Domain\Hal
 */
class Device
{
    /**
     * @var
     */
    public $id;

    /**
     * Device constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }
}
