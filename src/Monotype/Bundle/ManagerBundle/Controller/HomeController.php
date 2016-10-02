<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package Monotype\Bundle\ManagerBundle\Controller
 *
 *
 * @Route("/")
 */
class HomeController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     *
     * @Route("/", name="home_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'MonotypeManagerBundle:home:index.html.twig',
            array(//...
            )
        );
    }
}
