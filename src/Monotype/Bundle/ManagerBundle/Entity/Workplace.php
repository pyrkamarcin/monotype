<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Workplace
 *
 * @ORM\Table(name="workplace")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\WorkplaceRepository")
 */
class Workplace
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return Workplace
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
     * @return Workplace
     */
    public function setDateMod($dateMod)
    {
        $this->dateMod = $dateMod;

        return $this;
    }
}
