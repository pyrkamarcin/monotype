<?php

namespace Monotype\Bundle\DeamonBundle\Service;

use \Uecode\Daemon;
use \Uecode\Daemon\Exception;

/**
 * Class DaemonService
 * @package Monotype\Bundle\DeamonBundle\Service
 */
class DaemonService
{

    /**
     * @var \Uecode\Daemon;
     */
    protected $_daemon;
    /**
     * @var array
     */
    private $_config = array();
    /**
     * @var
     */
    private $_pid;
    /**
     * @var int
     */
    private $_interval = 2;

    /**
     * @param $options
     * @throws Exception
     */
    public function initialize($options)
    {
        if (empty($options)) {
            throw new Exception('Daemon instantiated without a config!');
        }

        $this->setConfig($options);
        $this->setPid($this->getPid());
        $this->setDaemon(new Daemon($this->getConfig()));
    }

    /**
     * @return bool
     */
    public function getPid()
    {
        if (!empty($this->_pid)) {
            return $this->_pid;
        }
        return $this->readFile($this->getConfig('appPidLocation'));
    }

    /**
     * @param $pid
     */
    public function setPid($pid)
    {
        $this->_pid = $pid;
    }

    /**
     * @param $filename
     * @param bool $return
     * @return bool
     */
    private function readFile($filename, $return = false)
    {
        if (!file_exists($filename)) {
            return $return;
        }
        return file_get_contents($filename);
    }

    /**
     * @param string $key
     * @return array
     */
    public function getConfig($key = '')
    {
        if ($key != '') {
            return trim($this->_config[$key]);
        }
        return $this->_config;
    }

    /**
     * @param $config
     */
    public function setConfig($config)
    {
        $this->_config = $config;
    }

    /**
     * @return int
     */
    public function getInterval()
    {
        return $this->_interval;
    }

    /**
     * @param $interval
     */
    public function setInterval($interval)
    {
        $this->_interval = $interval;
    }

    /**
     * @return bool
     */
    public function start()
    {
        $daemon = $this->getDaemon();
        $this->_daemon->setSigHandler(
            'SIGTERM',
            function () use ($daemon) {
                $daemon->warning("Received SIGTERM. ");
                $daemon->stop();
            }
        );

        $status = $this->_daemon->start();
        $this->_daemon->info('{appName} System Daemon Started at %s', date("F j, Y, g:i a"));
        $this->setPid($this->getPid());
        return $status;
    }

    /**
     * @return \Uecode\Daemon
     */
    public function getDaemon()
    {
        return $this->_daemon;
    }

    /**
     * @param \Uecode\Daemon $daemon
     */
    public function setDaemon(Daemon $daemon)
    {
        $this->_daemon = $daemon;
    }

    /**
     *
     */
    public function restart()
    {
        return $this->_daemon->restart();
    }

    /**
     * @param $sec
     */
    public function iterate($sec)
    {
        return $this->_daemon->iterate($sec);
    }

    /**
     * @return bool
     */
    public function isRunning()
    {
        return $this->_daemon->isRunning();
    }

    /**
     *
     */
    public function stop()
    {
        return $this->_daemon->stop();
    }
}
