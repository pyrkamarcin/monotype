<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Dumper\Stock;

/**
 * Class Dumper
 * @package Monotype\Domain\Hal
 */
class Dumper
{
    protected $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }
}
