<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guide
 *
 * @ORM\Table(name="guide")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\GuideRepository")
 */
class Guide
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
     *
     * @ORM\Column(type="string", length=255)
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $week;

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
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Assortment", inversedBy="guide")
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
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return Guide
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Guide
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
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
     * @return Guide
     */
    public function setAssortment(\Monotype\Bundle\ManagerBundle\Entity\Assortment $assortment = null)
    {
        $this->assortment = $assortment;

        return $this;
    }

    /**
     * Get week
     *
     * @return integer
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * Set week
     *
     * @param integer $week
     *
     * @return Guide
     */
    public function setWeek($week)
    {
        $this->week = $week;

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
     * @return Guide
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
     * @return Guide
     */
    public function setDateMod($dateMod)
    {
        $this->dateMod = $dateMod;

        return $this;
    }
}
