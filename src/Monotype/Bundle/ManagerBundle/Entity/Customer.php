<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\CustomerRepository")
 */
class Customer
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $shortName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Assortment", mappedBy="customer")
     */
    private $assortment;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Plan", mappedBy="customer")
     */
    private $plan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->assortment = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Customer
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

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
     * @return Customer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Add assortment
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment
     *
     * @return Customer
     */
    public function addAssortment(\Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment)
    {
        $this->assortment[] = $assortment;

        return $this;
    }

    /**
     * Remove assortment
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment
     */
    public function removeAssortment(\Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment)
    {
        $this->assortment->removeElement($assortment);
    }

    /**
     * Get assortment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssortment()
    {
        return $this->assortment;
    }

    /**
     * Add plan
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Plan $plan
     *
     * @return Customer
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
}
