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
        $processes = $em->getRepository('MonotypeBowmanBundle:Process')->findAll();

        $finder = new Finder();
        $finder->files()->in(__DIR__);


        foreach ($finder as $file) {
            // Dump the absolute path
            var_dump($file->getRealpath());

            // Dump the relative path to the file, omitting the filename
            var_dump($file->getRelativePath());

            // Dump the relative path to the file
            var_dump($file->getRelativePathname());
        }

        return $this->render('MonotypeBowmanBundle:synchro:show_diff.html.twig', array());
    }
}
