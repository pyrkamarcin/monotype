<?php

namespace Monotype\Bundle\ServerBundle\Domain\Model;

use Monotype\Bundle\ServerBundle\Domain\Model;

/**
 * Class Path
 * @package Monotype\Bundle\ServerBundle\Domain\Model
 */
class Path extends Model
{
    /**
     * @var
     */
    protected $location;

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }
}
