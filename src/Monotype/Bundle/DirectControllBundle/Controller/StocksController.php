<?php

namespace Monotype\Bundle\DirectControllBundle\Controller;

use Monotype\Bundle\DirectControllBundle\Entity\Stocks;
use Monotype\Bundle\DirectControllBundle\Form\StocksType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Stocks controller.
 * @package Monotype\Bundle\DirectControllBundle\Controller
 * @Route("/manager/stocks")
 */
class StocksController extends Controller
{
    /**
     * Lists all Stocks entities.
     *
     * @Route("/", name="manager_stocks_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stocks = $em->getRepository('MonotypeDirectControllBundle:Stocks')->findAll();

        return $this->render('MonotypeDirectControllBundle:stocks:index.html.twig', array(
            'stocks' => $stocks,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * Creates a new Stocks entity.
     *
     * @Route("/new", name="manager_stocks_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stock = new Stocks();
        $form = $this->createForm('Monotype\Bundle\DirectControllBundle\Form\StocksType', $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('stocks_show', array('id' => $stock->getId()));
        }

        return $this->render('MonotypeDirectControllBundle:stocks:new.html.twig', array(
            'stock' => $stock,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Stocks $stock
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * Finds and displays a Stocks entity.
     *
     * @Route("/{id}", name="manager_stocks_show")
     * @Method("GET")
     */
    public function showAction(Stocks $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);

        return $this->render('MonotypeDirectControllBundle:stocks:show.html.twig', array(
            'stock' => $stock,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Stocks $stock
     * @return \Symfony\Component\Form\Form
     *
     * Creates a form to delete a Stocks entity.
     *
     * @param Stocks $stock The Stocks entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stocks $stock)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stocks_delete', array('id' => $stock->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @param Request $request
     * @param Stocks $stock
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * Displays a form to edit an existing Stocks entity.
     *
     * @Route("/{id}/edit", name="manager_stocks_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Stocks $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);
        $editForm = $this->createForm('Monotype\Bundle\DirectControllBundle\Form\StocksType', $stock);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('stocks_edit', array('id' => $stock->getId()));
        }

        return $this->render('MonotypeDirectControllBundle:stocks:edit.html.twig', array(
            'stock' => $stock,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param Stocks $stock
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * Deletes a Stocks entity.
     *
     * @Route("/{id}", name="manager_stocks_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Stocks $stock)
    {
        $form = $this->createDeleteForm($stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stock);
            $em->flush();
        }

        return $this->redirectToRoute('stocks_index');
    }
}
