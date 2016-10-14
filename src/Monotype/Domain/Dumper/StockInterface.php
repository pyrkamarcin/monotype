<?php

namespace Monotype\Domain\Dumper;

/**
 * Interface StockInterface
 * @package Monotype\Domain\Dumper
 */
interface StockInterface
{
    /**
     * @param null $data
     * @return mixed
     */
    public function push($data = null);
}
