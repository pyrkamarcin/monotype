<?php

namespace Monotype\Bundle\PosBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class TerminalController
 * @package Monotype\Bundle\PosBundle\Controller
 *
 * @Route("/terminal")
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
     * @Route("/lock", name="terminal_lock")
     */
    public function lockAction()
    {
        return $this->render('MonotypePosBundle:Terminal:lock.html.twig', array(// ...
        ));
    }
}
