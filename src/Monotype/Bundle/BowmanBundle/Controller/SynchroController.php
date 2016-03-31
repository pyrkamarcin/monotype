<?php

namespace Monotype\Bundle\BowmanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SynchroController extends Controller
{
    /**
     * @Route("/synchro/showdiff")
     */
    public function ShowDiffAction()
    {
        return $this->render('MonotypeBowmanBundle:Synchro:show_diff.html.twig', array(
            // ...
        ));
    }

}
