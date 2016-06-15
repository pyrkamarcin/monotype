<?php

namespace Monotype\Bundle\UtilityBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ToolController
 * @package Monotype\Bundle\UtilityBundle\Controller
 *
 * @Route("/tool")
 */
class ToolController extends Controller
{
    /**
     * @Route("/", name="tool_index")
     */
    public function indexAction()
    {
        return $this->render('MonotypeUtilityBundle:Tool:index.html.twig', array(// ...
        ));
    }

    /**
     * @Route("/lock", name="tool_lock")
     */
    public function lockAction()
    {
        return $this->render('MonotypeUtilityBundle:Tool:lock.html.twig', array(// ...
        ));
    }
}
