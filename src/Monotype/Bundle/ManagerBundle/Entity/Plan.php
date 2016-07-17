<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plan
 *
 * @ORM\Table(name="plan")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\PlanRepository")
 */
class Plan
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
     * @ORM\Column(type="string", length=255)
     */
    private $orderPosition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orderNumber;

    /**
     * @ORM\Column(type="string", length=1023, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $pc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $dateMod;

    /**
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Customer", inversedBy="plan")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Assortment", inversedBy="plan")
     * @ORM\JoinColumn(name="assortment_id", referencedColumnName="id")
     */
    private $assortment;

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
     * Get orderNumber
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Set orderNumber
     *
     * @param string $orderNumber
     *
     * @return Plan
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Monotype\Bundle\ManagerBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set customer
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Customer $customer
     *
     * @return Plan
     */
    public function setCustomer(\Monotype\Bundle\ManagerBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

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
     * @return Plan
     */
    public function setAssortment(\Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment = null)
    {
        $this->assortment = $assortment;

        return $this;
    }

    /**
     * Get orderPosition
     *
     * @return string
     */
    public function getOrderPosition()
    {
        return $this->orderPosition;
    }

    /**
     * Set orderPosition
     *
     * @param string $orderPosition
     *
     * @return Plan
     */
    public function setOrderPosition($orderPosition)
    {
        $this->orderPosition = $orderPosition;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Plan
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     *
     * @return Plan
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateMod
     *
     * @return \DateTime
     */
    public function getDateMod()
    {
        return $this->dateMod;
    }

    /**
     * Set dateMod
     *
     * @param \DateTime $dateMod
     *
     * @return Plan
     */
    public function setDateMod($dateMod)
    {
        $this->dateMod = $dateMod;

        return $this;
    }

    /**
     * Get pc
     *
     * @return integer
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * Set pc
     *
     * @param integer $pc
     *
     * @return Plan
     */
    public function setPc($pc)
    {
        $this->pc = $pc;

        return $this;
    }
}
