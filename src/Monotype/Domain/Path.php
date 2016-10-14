<?php

namespace Monotype\Domain;

/**
 * Class Path
 * @package Monotype\Domain
 */
class Path
{
    /**
     * @var
     */
    private $path;

    /**
     * Path constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
}
