<?php

namespace Tests\Monotype\Domain\Hal;

use Monotype\Domain\Hal\Dumper;
use Monotype\Domain\Hal\Dumper\Stock;

/**
 * Class DumperTest
 * @package Tests\Monotype\Domain\Hal
 */
class DumperTest extends \PHPUnit_Framework_TestCase
{
    public function testStockize()
    {
        $dumper = new Dumper(new Stock());

        $result = $dumper->stockize('1234567890abcdefghijklmnoprstuwvxyz');

        $this->assertEquals(true, $result);
    }
}
