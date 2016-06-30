<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Worker
 *
 * @ORM\Table(name="workerCategory")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\WorkerCategoryRepository")
 */
class WorkerCategory
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
    private $fullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
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
     * @ORM\OneToMany(targetEntity="Monotype\Bundle\ManagerBundle\Entity\Worker", mappedBy="workerCategory")
     */
    private $worker;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->worker = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return WorkerCategory
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

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
     * @return WorkerCategory
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
     * @return WorkerCategory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Add worker
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Worker $worker
     *
     * @return WorkerCategory
     */
    public function addWorker(\Monotype\Bundle\ManagerBundle\Entity\Worker $worker)
    {
        $this->worker[] = $worker;

        return $this;
    }

    /**
     * Remove worker
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\Worker $worker
     */
    public function removeWorker(\Monotype\Bundle\ManagerBundle\Entity\Worker $worker)
    {
        $this->worker->removeElement($worker);
    }

    /**
     * Get worker
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorker()
    {
        return $this->worker;
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
     * @return WorkerCategory
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
     * @return WorkerCategory
     */
    public function setDateMod($dateMod)
    {
        $this->dateMod = $dateMod;

        return $this;
    }
}
