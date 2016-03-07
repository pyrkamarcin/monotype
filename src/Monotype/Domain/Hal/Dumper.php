<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Dumper\Stock;

/**
 * Class Dumper
 * @package Monotype\Domain\Hal
 */
class Dumper
{
    public $stock;
    private $defaultPath = 'var/temp/';

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    public function stockize($data)
    {
        return $this->stock->push($this->defaultPath, $data);
    }
}
