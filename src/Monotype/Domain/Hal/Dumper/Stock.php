<?php

namespace Monotype\Domain\Hal\Dumper;

use Doctrine\ORM\EntityManager;
use Monotype\Bundle\BowmanBundle\Entity\Stocks;
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
    private $hash;

    /**
     * @var
     */
    public $path;

    /**
     * @var
     */
    public $uniqId;

    protected $em;

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

    /**
     * Stock constructor.
     */
    public function __construct()
    {
        $this->setUniqId(Uuid::uuid1());
        $this->setPath('var' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . $this->uniqId);

        mkdir($this->getPath());
    }

    /**
     * @param null $data
     * @return bool
     */
    public function push($data = null)
    {
        $this->setHash(Uuid::uuid1() . "_" . Uuid::uuid5(Uuid::NAMESPACE_DNS, $data));
        file_put_contents($this->getPath() . DIRECTORY_SEPARATOR . $this->getHash(), $data);


        $this->em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $stocks = new Stocks();
        $stocks->setHash("hash_test");
        $stocks->setFile("file_test");
        $stocks->setDatetime(new \DateTime('now'));

        $this->em->persist($stocks);
        $this->em->flush();

        return $this->getUniqId();
    }
}
