<?php

namespace Monotype\Bundle\ServerBundle\Domain\Model;

use PHPUnit\Framework\TestCase;

/**
 * Class PathTest
 * @package Monotype\Domain\Model
 */
class PathTest extends TestCase
{
    /**
     *
     */
    public function testPathConstructor()
    {
        $path = new Path([
            'location' => '/test/path'
        ]);
        $this->assertEquals('/test/path', $path->getLocation());
    }
}
