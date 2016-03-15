<?php

namespace Monotype\Domain\Hal;

/**
 * Class Repository
 * @package Monotype\Domain\Hal
 */
class Repository
{
    /**
     * @var
     */
    public $path;

    /**
     * Repository constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function push(File $file)
    {
    }

    public function pull(File $file)
    {
    }
}
