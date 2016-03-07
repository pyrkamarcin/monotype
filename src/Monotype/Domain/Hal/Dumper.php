<?php

namespace Monotype\Domain\Hal;

use Monotype\Domain\Hal\Dumper\Stock;

/**
 * Class Dumper
 * @package Monotype\Domain\Hal
 */
class Dumper
{
    /**
     * @var Stock
     */
    public $stock;
    /**
     * @var string
     */
    private $defaultPath = 'var' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

    /**
     * Dumper constructor.
     * @param Stock $stock
     */
    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    /**
     * @param $data
     * @return bool
     */
    public function stockize($data)
    {
        return $this->stock->push($this->defaultPath, $data);
    }
}
