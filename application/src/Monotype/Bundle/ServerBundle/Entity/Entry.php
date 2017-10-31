<?php

namespace Monotype\Bundle\ServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CronReport
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ServerBundle\Entity\EntryRepository")
 */
class Entry
{
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime $dateTime
     */
    protected $dateTime;
    /**
     * @ORM\Column(type="text")
     * @var string $output
     */
    protected $output;
    /**
     * @var \Ramsey\Uuid\Uuid
     *
     * @ORM\Id()
     * @ORM\Column(type="uuid")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOutput(): string
    {
        return $this->output;
    }

    /**
     * @param string $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }
}
