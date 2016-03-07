<?php

namespace Tests\Monotype\Domain\Hal\Dumper;

use Monotype\Domain\Hal\Dumper\Stock;

/**
 * Class StockTest
 * @package Tests\Monotype\Domain\Hal\Dumper
 */
class StockTest extends \PHPUnit_Framework_TestCase
{
    public function testPush()
    {
        $stock = new Stock();
        $result = $stock->push('var/temp/', '1234567890abcdefghijklmnoprstuwvxyz');

        $this->assertEquals(true, $result);
    }
}
