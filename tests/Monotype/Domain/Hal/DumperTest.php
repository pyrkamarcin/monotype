<?php

namespace Tests\Monotype\Domain\Hal;

use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Dumper\Stock;

class DumperTest extends \PHPUnit_Framework_TestCase
{
    public function testPush()
    {
        $dumper = new Dumper(new Stock());

        $result = $dumper->stockize('1234567890abcdefghijklmnoprstuwvxyz');

        $this->assertEquals(true, $result);
    }
}
