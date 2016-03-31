<?php

namespace Monotype\Bundle\BowmanBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\Finder;

/**
 * Class SynchroController
 * @package Monotype\Bundle\BowmanBundle\Controller
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
        return $this->render('MonotypeBowmanBundle:synchro:index.html.twig', array());
    }

    /**
     * Show all differences (db vs stock)
     *
     * @Route("/showdiff", name="synchro_showdiff")
     * @Method("GET")
     */
    public function ShowDiffAction()
    {
        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('MonotypeBowmanBundle:Stocks')->findAll();

        $array_stocks = array();
        foreach ($stocks as $stock) {
            $array_stocks[] = $stock->getFile();
        }

        $finder = new Finder();
        $path = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');

        $finder->files()->in($path . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'stock');

        var_dump($array_stocks);
        var_dump($finder);

        return $this->render('MonotypeBowmanBundle:synchro:show_diff.html.twig', array());
    }
}
