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
    private $hash;

    /**
     * @var
     */
    public $path;

    /**
     * @var
     */
    public $uniqid;

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getUniqid()
    {
        return $this->uniqid;
    }

    /**
     * @param mixed $uniqid
     */
    public function setUniqid($uniqid)
    {
        $this->uniqid = $uniqid;
    }

    /**
     * Stock constructor.
     */
    public function __construct()
    {
        $this->setUniqid(uniqid());
        $this->setPath('var' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . $this->uniqid);

        mkdir($this->getPath());
    }

    /**
     * @param null $data
     * @return bool
     */
    public function push($data = null)
    {
        $this->setHash(uniqid() . "_" . sha1($data));
        file_put_contents($this->getPath() . DIRECTORY_SEPARATOR . $this->getHash(), $data);

        return $this->getUniqid();
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
