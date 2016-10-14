<?php

namespace Monotype\Domain\Connector;

/**
 * Class Buffer
 * @package Monotype\Domain\Connector
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
