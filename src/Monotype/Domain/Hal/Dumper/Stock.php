<?php

namespace Monotype\Domain\Hal\Dumper;

use Monotype\Domain\Hal\Path;
use Ramsey\Uuid\Uuid;

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
    /**
     * @var
     */
    public $uniqId;
    /**
     * @var
     */
    private $hash;

    /**
     * Stock constructor.
     */
    public function __construct(Path $path)
    {

        /**
         * @TODO: sprawdzić czy uuid'y są jeszcze potrzebne!
         */
        $this->setUniqId(Uuid::uuid1());
        $this->setHash(Uuid::uuid1());
        $this->setPath($path->getPath());

        /**
         * @TODO: mkdir? Po co?
         */
//        mkdir($this->getPath());
    }

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
     * @param null $data
     * @return bool
     */
    public function push($data = null)
    {
        /**
         * @TODO: chyba nie są... ?
         */
//        $this->setHash(Uuid::uuid1() . "_" . Uuid::uuid5(Uuid::NAMESPACE_DNS, $data));
//        $this->setHash(Uuid::uuid1());
        file_put_contents($this->getPath(), $data, FILE_APPEND);

        return $this->getUniqId();
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
    public function getUniqId()
    {
        return $this->uniqId->toString();
    }

    /**
     * @param Uuid $uuid
     */
    public function setUniqId($uuid)
    {
        $this->uniqId = $uuid;
    }
}
