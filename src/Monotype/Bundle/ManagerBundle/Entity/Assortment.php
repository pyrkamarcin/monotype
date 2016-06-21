<?php

namespace Monotype\Bundle\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assortment
 *
 * @ORM\Table(name="assortment")
 * @ORM\Entity(repositoryClass="Monotype\Bundle\ManagerBundle\Repository\AssortmentRepository")
 */
class Assortment
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

