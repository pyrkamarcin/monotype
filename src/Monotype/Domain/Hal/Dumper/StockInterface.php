<?php

namespace Monotype\Domain\Hal\Dumper;

/**
 * Interface StockInterface
 * @package Monotype\Domain\Hal\Dumper
 */
interface StockInterface
{
    /**
     * @param $path
     * @param null $data
     * @return mixed
     */
    public function push($path, $data = null);

    /**
     * @param $path
     * @return mixed
     */
    public function get($path);
}
