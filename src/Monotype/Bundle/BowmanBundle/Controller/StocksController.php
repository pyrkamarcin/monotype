<?php

namespace Monotype\Bundle\BowmanBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Monotype\Bundle\BowmanBundle\Entity\Stocks;
use Monotype\Bundle\BowmanBundle\Form\StocksType;

/**
 * Stocks controller.
 *
 * @Route("/stocks")
 */
class StocksController extends Controller
{
    /**
     * Lists all Stocks entities.
     *
     * @Route("/", name="stocks_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stocks = $em->getRepository('MonotypeBowmanBundle:Stocks')->findAll();

        return $this->render('stocks/index.html.twig', array(
            'stocks' => $stocks,
        ));
    }

    /**
     * Creates a new Stocks entity.
     *
     * @Route("/new", name="stocks_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stock = new Stocks();
        $form = $this->createForm('Monotype\Bundle\BowmanBundle\Form\StocksType', $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('stocks_show', array('id' => $stock->getId()));
        }

        return $this->render('stocks/new.html.twig', array(
            'stock' => $stock,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Stocks entity.
     *
     * @Route("/{id}", name="stocks_show")
     * @Method("GET")
     */
    public function showAction(Stocks $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);

        return $this->render('stocks/show.html.twig', array(
            'stock' => $stock,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Stocks entity.
     *
     * @Route("/{id}/edit", name="stocks_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Stocks $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);
        $editForm = $this->createForm('Monotype\Bundle\BowmanBundle\Form\StocksType', $stock);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('stocks_edit', array('id' => $stock->getId()));
        }

        return $this->render('stocks/edit.html.twig', array(
            'stock' => $stock,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Stocks entity.
     *
     * @Route("/{id}", name="stocks_delete")
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

    /**
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
            ->getForm()
        ;
    }
}
