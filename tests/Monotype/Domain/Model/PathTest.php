<?php

namespace Monotype\Domain\Model;

/**
 * Class PathTest
 * @package Monotype\Domain\Model
 */
class PathTest extends \PHPUnit_Framework_TestCase
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
