<?php

namespace Monotype\Domain\Hal\Dumper;

/**
 * Class Stock
 * @package Monotype\Domain\Hal\Dumper
 */
class Stock implements StockInterface
{
    /**
     * @var
     */
    public $path;

    public $uniqid;

    /**
     * Stock constructor.
     */
    public function __construct()
    {
        $this->uniqid = uniqid();
        $this->path = 'var' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . $this->uniqid;

        mkdir($this->path);
    }

    /**
     * @param null $data
     * @return bool
     */
    public function push($data = null)
    {
        $hash = uniqid() . "_" . sha1($data);
        file_put_contents($this->path . DIRECTORY_SEPARATOR . $hash, $data);

        return $this->uniqid;
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
