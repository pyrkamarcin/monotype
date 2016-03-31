<?php

namespace Monotype\Bundle\BowmanBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/synchro")
 */
class SynchroController extends Controller
{

    /**
     * Home page for SynchroController
     *
     * @Route("/", name="synchro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('MonotypeBowmanBundle:Synchro:index.html.twig', array(//
        ));
    }

    /**
     * Show all differences (db vs stock)
     *
     * @Route("/showdiff", name="synchro_showdiff")
     * @Method("GET")
     */
    public function ShowDiffAction()
    {
        return $this->render('MonotypeBowmanBundle:Synchro:show_diff.html.twig', array());
    }
}
