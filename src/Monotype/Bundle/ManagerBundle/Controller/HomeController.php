<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="home_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'MonotypeManagerBundle:home:index.html.twig',
            array(// ...
            )
        );
    }
}
