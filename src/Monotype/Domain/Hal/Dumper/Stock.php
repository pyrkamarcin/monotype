<?php

namespace Monotype\Domain\Hal\Dumper;

/**
 * Class Stock
 * @package Monotype\Domain\Hal\Dumper
 */
class Stock implements StockInterface
{
    public $path;

    /**
     * @var
     */
    public $uniqid;

    public function __construct($path, $uniqid)
    {
        $this->path = $path;
        $this->uniqid = $uniqid;

        mkdir($this->path . $this->uniqid);
    }

    /**
     * @param null $data
     * @return bool
     */
    public function push($data = null)
    {
        $hash = uniqid() . "_" . sha1($data);
        file_put_contents($this->path . $this->uniqid . DIRECTORY_SEPARATOR . $hash, $data);

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
