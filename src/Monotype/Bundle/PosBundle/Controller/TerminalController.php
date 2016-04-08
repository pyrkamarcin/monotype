<?php

namespace Monotype\Bundle\PosBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class TerminalController
 * @package Monotype\Bundle\PosBundle\Controller
 */
class TerminalController extends Controller
{
    /**
     * @Route("/", name="terminal_index")
     */
    public function indexAction()
    {
        return $this->render('MonotypePosBundle:Terminal:index.html.twig', array(// ...
        ));
    }

    /**
     * @Route("/dashboard", name="terminal_dashboard")
     */
    public function dashboardAction()
    {
        return $this->render('MonotypePosBundle:Terminal:dashboard.html.twig', array(// ...
        ));
    }

    /**
     * @Route("/lock", name="terminal_lock")
     */
    public function lockAction()
    {
        return $this->render('MonotypePosBundle:Terminal:lock.html.twig', array(// ...
        ));
    }
}
