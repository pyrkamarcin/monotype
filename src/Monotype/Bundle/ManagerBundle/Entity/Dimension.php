<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dimension
 *
 * @ORM\Table(name="dimension")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\DimensionRepository")
 */
class Dimension
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
     * @var string
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $priority;

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
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Assortment", inversedBy="dimension")
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
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Dimension
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
     * @return Dimension
     */
    public function setAssortment(\Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment = null)
    {
        $this->assortment = $assortment;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Dimension
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set priority
     *
     * @param string $priority
     *
     * @return Dimension
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

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
     * @return Dimension
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
     * @return Dimension
     */
    public function setDateMod($dateMod)
    {
        $this->dateMod = $dateMod;

        return $this;
    }
}
