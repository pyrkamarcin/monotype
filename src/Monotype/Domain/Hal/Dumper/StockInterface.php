<?php

namespace Monotype\Domain\Hal\Dumper;

/**
 * Interface StockInterface
 * @package Monotype\Domain\Hal\Dumper
 */
interface StockInterface
{
    /**
     * @param null $data
     * @return mixed
     */
    public function push($data = null);

    /**
     * @param $path
     * @return mixed
     */
    public function pull($path);
}
