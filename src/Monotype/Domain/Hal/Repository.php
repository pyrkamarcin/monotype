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

    /**
     * @param File $file
     * @return bool
     */
    public function push(File $file)
    {
        return true;
    }

    /**
     * @param File $file
     * @return bool
     */
    public function pull(File $file)
    {
        return true;
    }
}
