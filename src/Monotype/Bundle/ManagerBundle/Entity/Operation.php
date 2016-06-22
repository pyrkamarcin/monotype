<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operation
 *
 * @ORM\Table(name="operation")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\OperationRepository")
 */
class Operation
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Rate", mappedBy="operation")
     */
    private $rate;

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
     * @return Operation
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @return Operation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Add rate
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Rate $rate
     *
     * @return Operation
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
}
