<?php

namespace Monotype\Domain\Hal;

/**
 * Class File
 * @package Monotype\Domain\Hal
 */
class File
{
    public $handler;
    private $path;
    private $name;

    /**
     * File constructor.
     * @param $path
     * @param $name
     */
    public function __construct($path, $name)
    {
        $this->path = $path;
        $this->name = $name;

        $this->composerHandler();
    }

    private function composerHandler()
    {
        $this->handler = $this->path . DIRECTORY_SEPARATOR . $this->name;
    }

    /**
     * @return mixed
     */
    public function read()
    {
        return file_get_contents($this->handler);
    }

    /**
     * @return mixed
     */
    public function lenght()
    {
        return filesize($this->handler);
    }
}
