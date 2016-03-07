<?php

namespace Monotype\Domain\Hal\Dumper;

/**
 * Class Stock
 * @package Monotype\Domain\Hal\Dumper
 */
class Stock implements StockInterface
{
    /**
     * @param $path
     * @param null $data
     * @return bool
     */
    public function push($path, $data = null)
    {
        $hash = uniqid() . "_" . sha1($data);
        file_put_contents($path . DIRECTORY_SEPARATOR . $hash, $data);

        return true;
    }

    /**
     * @param $path
     * @return bool
     */
    public function pull($path)
    {
        // TODO: Implement get() method.
        return true;
    }
}
