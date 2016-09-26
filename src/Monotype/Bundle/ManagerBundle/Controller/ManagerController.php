<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/manager")
 */
class ManagerController extends Controller
{
    /**
     * @Route("/", name="manager_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'MonotypeManagerBundle:manager:index.html.twig',
            array(// ...
            )
        );
    }
}
