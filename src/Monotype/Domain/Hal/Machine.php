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
            case 'repeater':
                $this->parametrs = array(
                    'id' => '0',
                    'name' => 'repeater',
                    'protocol' => 'tcp',
                    'address' => '0.0.0.0',
                    'port' => '4001',
                    'location' => 'none'
                );
                break;
            case 'loopback':
                $this->parametrs = array(
                    'id' => '0',
                    'name' => 'loopback',
                    'protocol' => 'tcp',
                    'address' => '192.168.1.20',
                    'port' => '4001',
                    'location' => 'none'
                );
                break;
            case '1':
                $this->parametrs = array(
                    'id' => '1',
                    'name' => 'CTX1',
                    'protocol' => 'tcp',
                    'address' => '192.168.100.111',
                    'port' => '4001',
                    'location' => 'main'
                );
                break;
            case '2':
                $this->parametrs = array(
                    'id' => '2',
                    'name' => 'CTX2',
                    'protocol' => 'tcp',
                    'address' => '192.168.100.112',
                    'port' => '4001',
                    'location' => 'main'
                );
                break;
            case '3':
                $this->parametrs = array(
                    'id' => '3',
                    'name' => 'CTX3',
                    'protocol' => 'tcp',
                    'address' => '192.168.100.113',
                    'port' => '4001',
                    'location' => 'main'
                );
                break;
            case '4':
                $this->parametrs = array(
                    'id' => '4',
                    'name' => 'CTX4',
                    'protocol' => 'tcp',
                    'address' => '192.168.100.114',
                    'port' => '4001',
                    'location' => 'main'
                );
                break;
            case '100':
                $this->parametrs = array(
                    'id' => '100',
                    'name' => '100',
                    'protocol' => 'tcp',
                    'address' => '192.168.1.99',
                    'port' => '3001',
                    'location' => 'main'
                );
                break;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->parametrs['id'];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->parametrs['name'];
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->parametrs['protocol'];
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->parametrs['address'];
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->parametrs['port'];
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->parametrs['location'];
    }
}
