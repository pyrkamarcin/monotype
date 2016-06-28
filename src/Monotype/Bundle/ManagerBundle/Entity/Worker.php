<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Worker
 *
 * @ORM\Table(name="worker")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\WorkerRepository")
 */
class Worker
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
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $card;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $pesel;

    /**
     * @ORM\ManyToOne(targetEntity="Monotype\Bundle\ManagerBundle\Entity\WorkerCategory", inversedBy="worker")
     * @ORM\JoinColumn(name="workerCategory_id", referencedColumnName="id")
     */
    private $workerCategory;

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
     * @return Worker
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Worker
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get card
     *
     * @return string
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Set card
     *
     * @param string $card
     *
     * @return Worker
     */
    public function setCard($card)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get pesel
     *
     * @return string
     */
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * Set pesel
     *
     * @param string $pesel
     *
     * @return Worker
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;

        return $this;
    }

    /**
     * Get workerCategory
     *
     * @return \Monotype\Bundle\ManagerBundle\Entity\WorkerCategory
     */
    public function getWorkerCategory()
    {
        return $this->workerCategory;
    }

    /**
     * Set workerCategory
     *
     * @param \Monotype\Bundle\ManagerBundle\Entity\WorkerCategory $workerCategory
     *
     * @return Worker
     */
    public function setWorkerCategory(\Monotype\Bundle\ManagerBundle\Entity\WorkerCategory $workerCategory = null)
    {
        $this->workerCategory = $workerCategory;

        return $this;
    }
}
