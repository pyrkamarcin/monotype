<?php

namespace Monotype\Bundle\BowmanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/bowman")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}
