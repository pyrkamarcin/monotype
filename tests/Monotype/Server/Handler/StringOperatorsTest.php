<?php

namespace Monotype\Server\Handler;

class StringOperatorsTest extends \PHPUnit_Framework_TestCase
{
    public function testLeftReplace()
    {
        $output = StringOperators::leftReplace('_', '.', '603779NA_RAZ_MPF');
        $this->assertEquals('603779NA_RAZ.MPF', $output);
    }

    public function testGetFileName()
    {
        $output = StringOperators::getFileName('%_N_603779NA_L83_5_MPF');
        $this->assertEquals('603779NA_L83_5.MPF', $output);
    }

    public function testGetTwoFirstLines()
    {
        $output = StringOperators::getTwoFirstLines('%_N_BP_100_S1_MPF
;$PATH=/_N_WKS_DIR/_N_FORMY_WPD
N5 F_HEAD(365690879,56.425,0.,14.3,-22.,1.,1.,6.5,-150.,154.801,408.3665,1.,2500.,0.,71,1,799,0,-14.,-50.,7,1,6,20.,38.73,20.,1);*RO*
N20 F_CON("KKKKKKKK",4,"E_LAB_A_KKKKKKKK","E_LAB_E_KKKKKKKK");*RO*
N25 F_ROU_Z("WykanczakCCMT06","",1,0.04,3,160.,2,0,0,"KKKKKKKK",,,"2014121223544467","MATERIAL1",,,"",313221,0.07,0.,0.,0.5,3,0.05,0.1,0.05,0,0.1,0,2,0.2,91,0.1,91,120,0.,0.,0.,0.,7.49,-6.,0.,0.,1,0.,"19403798790017359500","18529256447200079700",0.,1,6.7829,-20.0929);*RO*
F_END(0,1,5);*RO*
M30 ;#SM;*RO*');

        $this->assertTrue(2 === count($output) and is_array($output));
    }

    public function testGetPath()
    {
        $output = StringOperators::getPath(';$PATH=/_N_WKS_DIR/_N_FORMY_WPD');
        $this->assertEquals('/WKS.DIR/FORMY.WPD', $output);
    }
}
