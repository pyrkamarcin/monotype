<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 *
 * @ORM\Table(name="rate")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\RateRepository")
 */
class Rate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Assortment", inversedBy="rate")
     * @ORM\JoinColumn(name="assortment_id", referencedColumnName="id")
     */
    private $assortment;

    /**
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Operation", inversedBy="rate")
     * @ORM\JoinColumn(name="operation_id", referencedColumnName="id")
     */
    private $operation;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Rate
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get assortment
     *
     * @return \Monotype\Bundle\ManagerBundle\Entity\Assortment
     */
    public function getAssortment()
    {
        return $this->assortment;
    }

    /**
     * Set assortment
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment
     *
     * @return Rate
     */
    public function setAssortment(\Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment = null)
    {
        $this->assortment = $assortment;

        return $this;
    }

    /**
     * Get operation
     *
     * @return \Monotype\Bundle\ManagerBundle\Entity\Operation
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set operation
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Operation $operation
     *
     * @return Rate
     */
    public function setOperation(\Monotype\Bundle\ManagerBundle\Entity\Operation $operation = null)
    {
        $this->operation = $operation;

        return $this;
    }
}
