<?php

namespace Monotype\Domain\Hal;

/**
 * Class Path
 * @package Monotype\Domain\Hal
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
