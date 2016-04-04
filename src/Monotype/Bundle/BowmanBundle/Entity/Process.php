<?php

namespace Monotype\Bundle\BowmanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Process
 *
 * @ORM\Table(name="Process")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\BowmanBundle\Repository\ProcessRepository")
 */
class Process
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
     * @ORM\Column(name="pid", type="string", length=255)
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="script", type="string", length=1024)
     */
    private $script;

    /**
     * @var string
     *
     * @ORM\Column(name="uid", type="string", length=255)
     */
    private $uid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;


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
     * Get pid
     *
     * @return string
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set pid
     *
     * @param string $pid
     *
     * @return Process
     */
    public function setPid($pid)
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * Get script
     *
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set script
     *
     * @param string $script
     *
     * @return Process
     */
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * Get uid
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set uid
     *
     * @param string $uid
     *
     * @return Process
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param \DateTime $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }
}

