<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assortment
 *
 * @ORM\Table(name="assortment")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\AssortmentRepository")
 */
class Assortment
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
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1023)
     */
    private $description;

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
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $defaultPcsInBox;

    /**
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Customer", inversedBy="assortment")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Rate", mappedBy="assortment")
     */
    private $rate;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Technology", mappedBy="assortment")
     */
    private $technology;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Plan", mappedBy="assortment")
     */
    private $plan;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Dimension", mappedBy="assortment")
     */
    private $dimension;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Guide", mappedBy="assortment")
     */
    private $guide;


    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Assortment", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Assortment", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rate = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Assortment
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Assortment
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @return Assortment
     */
    public function setCustomer(\Monotype\Bundle\ManagerBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Add rate
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Rate $rate
     *
     * @return Assortment
     */
    public function addRate(\Monotype\Bundle\ManagerBundle\Entity\Rate $rate)
    {
        $this->rate[] = $rate;

        return $this;
    }

    /**
     * Remove rate
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Rate $rate
     */
    public function removeRate(\Monotype\Bundle\ManagerBundle\Entity\Rate $rate)
    {
        $this->rate->removeElement($rate);
    }

    /**
     * Get rate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Add plan
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Plan $plan
     *
     * @return Assortment
     */
    public function addPlan(\Monotype\Bundle\ManagerBundle\Entity\Plan $plan)
    {
        $this->plan[] = $plan;

        return $this;
    }

    /**
     * Remove plan
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Plan $plan
     */
    public function removePlan(\Monotype\Bundle\ManagerBundle\Entity\Plan $plan)
    {
        $this->plan->removeElement($plan);
    }

    /**
     * Get plan
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlan()
    {
        return $this->plan;
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
     * @return Assortment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Add dimension
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Dimension $dimension
     *
     * @return Assortment
     */
    public function addDimension(\Monotype\Bundle\ManagerBundle\Entity\Dimension $dimension)
    {
        $this->dimension[] = $dimension;

        return $this;
    }

    /**
     * Remove dimension
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Dimension $dimension
     */
    public function removeDimension(\Monotype\Bundle\ManagerBundle\Entity\Dimension $dimension)
    {
        $this->dimension->removeElement($dimension);
    }

    /**
     * Get dimension
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * Add guide
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Guide $guide
     *
     * @return Assortment
     */
    public function addGuide(\Monotype\Bundle\ManagerBundle\Entity\Guide $guide)
    {
        $this->guide[] = $guide;

        return $this;
    }

    /**
     * Remove guide
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Guide $guide
     */
    public function removeGuide(\Monotype\Bundle\ManagerBundle\Entity\Guide $guide)
    {
        $this->guide->removeElement($guide);
    }

    /**
     * Get guide
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGuide()
    {
        return $this->guide;
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
     * @return Assortment
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
     * @return Assortment
     */
    public function setDateMod($dateMod)
    {
        $this->dateMod = $dateMod;

        return $this;
    }

    /**
     * Get defaultPcsInBox
     *
     * @return integer
     */
    public function getDefaultPcsInBox()
    {
        return $this->defaultPcsInBox;
    }

    /**
     * Set defaultPcsInBox
     *
     * @param integer $defaultPcsInBox
     *
     * @return Assortment
     */
    public function setDefaultPcsInBox($defaultPcsInBox)
    {
        $this->defaultPcsInBox = $defaultPcsInBox;

        return $this;
    }

    /**
     * Add technology
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Technology $technology
     *
     * @return Assortment
     */
    public function addTechnology(\Monotype\Bundle\ManagerBundle\Entity\Technology $technology)
    {
        $this->technology[] = $technology;

        return $this;
    }

    /**
     * Remove technology
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Technology $technology
     */
    public function removeTechnology(\Monotype\Bundle\ManagerBundle\Entity\Technology $technology)
    {
        $this->technology->removeElement($technology);
    }

    /**
     * Get technology
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * Add bOM
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\BOM $bOM
     *
     * @return Assortment
     */
    public function addBOM(\Monotype\Bundle\ManagerBundle\Entity\BOM $bOM)
    {
        $this->BOM[] = $bOM;

        return $this;
    }

    /**
     * Remove bOM
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\BOM $bOM
     */
    public function removeBOM(\Monotype\Bundle\ManagerBundle\Entity\BOM $bOM)
    {
        $this->BOM->removeElement($bOM);
    }

    /**
     * Get bOM
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBOM()
    {
        return $this->BOM;
    }

    /**
     * Add child
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Assortment $child
     *
     * @return Assortment
     */
    public function addChild(\Monotype\Bundle\ManagerBundle\Entity\Assortment $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Assortment $child
     */
    public function removeChild(\Monotype\Bundle\ManagerBundle\Entity\Assortment $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Get parent
     *
     * @return \Monotype\Bundle\ManagerBundle\Entity\Assortment
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set parent
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Assortment $parent
     *
     * @return Assortment
     */
    public function setParent(\Monotype\Bundle\ManagerBundle\Entity\Assortment $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }
}
