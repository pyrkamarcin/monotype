<?php

namespace Monotype\Bundle\DirectControllBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\Finder;

/**
 * Class SynchroController
 * @package Monotype\Bundle\DirectControllBundle\Controller
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
        return $this->render('MonotypeDirectControllBundle:synchro:index.html.twig', array());
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
        $stocks = $em->getRepository('MonotypeDirectControllBundle:Stocks')->findAll();

        $array_stocks = array();
        foreach ($stocks as $stock) {
            $array_stocks[] = $stock->getHash();
        }

        $finder = new Finder();
        $path = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');

        $finder->files()->in($path . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'stock');

        $array_files = array();
        foreach ($finder as $file) {
            $array_files[] = end(explode(DIRECTORY_SEPARATOR, $file->getRealpath()));
        }

        $differences = array_diff($array_stocks, $array_files);

        return $this->render('MonotypeDirectControllBundle:synchro:show_diff.html.twig', array(
            'differences' => $differences,
        ));

    }
}
