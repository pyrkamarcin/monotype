<?php

namespace Monotype\Bundle\DirectControllBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Machines
 *
 * @ORM\Table(name="machines")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\DirectControllBundle\Repository\MachinesRepository")
 */
class Machines
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
     * @ORM\Column(name="command", type="string", length=255, unique=true)
     */
    private $command;

    /**
     * @var string
     *
     * @ORM\Column(name="protocol", type="string", length=255)
     */
    private $protocol;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var int
     *
     * @ORM\Column(name="port", type="integer")
     */
    private $port;

    /**
     * @var string
     *
     * @ORM\Column(name="localtion", type="string", length=255)
     */
    private $localtion;


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
     * Get command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set command
     *
     * @param string $command
     *
     * @return Machines
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get protocol
     *
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Set protocol
     *
     * @param string $protocol
     *
     * @return Machines
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Machines
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set port
     *
     * @param integer $port
     *
     * @return Machines
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get localtion
     *
     * @return string
     */
    public function getLocaltion()
    {
        return $this->localtion;
    }

    /**
     * Set localtion
     *
     * @param string $localtion
     *
     * @return Machines
     */
    public function setLocaltion($localtion)
    {
        $this->localtion = $localtion;

        return $this;
    }
}

