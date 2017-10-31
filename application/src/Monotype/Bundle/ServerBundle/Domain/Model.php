<?php

namespace Monotype\Bundle\ServerBundle\Domain;

/**
 * Class Model
 * @package Monotype\Bundle\ServerBundle\Domain\Model
 */
class Model
{
    /**
     * Model constructor.
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
