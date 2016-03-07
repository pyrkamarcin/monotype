<?php

namespace Monotype\Domain\Hal;

/**
 * Class Machine
 * @package Monotype\Domain\Hal
 */
class Machine
{
    /**
     * @var
     */
    private $parametrs = array();

    /**
     * Machine constructor.
     * @param $id
     */
    public function __construct($id)
    {
        /**
         * @TODO przenieść ustawienia w zewnętrzne miejsce? może entity?
         */
        switch ($id) {
            case '1':
                $this->parametrs = array(
                    'id' => '1',
                    'name' => 'CTX1',
                    'protocol' => 'tcp',
                    'address' => '192.168.100.101',
                    'port' => '4001',
                    'location' => 'main'
                );
                break;
            case '2':
                $this->parametrs = array(
                    'id' => '2',
                    'name' => 'CTX2',
                    'protocol' => 'tcp',
                    'address' => '192.168.100.102',
                    'port' => '4001',
                    'location' => 'main'
                );
                break;
        }
    }

    /**
     * @return mixed
     */
    public function getParametrs()
    {
        return $this->parametrs;
    }
}
