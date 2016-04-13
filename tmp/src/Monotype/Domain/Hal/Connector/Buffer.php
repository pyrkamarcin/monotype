<?php

namespace Monotype\Domain\Hal\Connector;

/**
 * Class Buffer
 * @package Monotype\Domain\Hal\Connector
 */
class Buffer
{
    /**
     * @var
     */
    private $cache;

    /**
     * @return mixed
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param mixed $cache
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
    }

}
