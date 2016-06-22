<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Monotype\Bundle\ManagerBundle\Entity\Assortment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Assortment controller.
 *
 * @Route("/manager/assortment")
 */
class AssortmentController extends Controller
{
    /**
     * Lists all Assortment entities.
     *
     * @Route("/", name="manager_assortment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $assortments = $em->getRepository('MonotypeManagerBundle:Assortment')->findAll();

        return $this->render('assortment/index.html.twig', array(
            'assortments' => $assortments,
        ));
    }

    /**
     * Creates a new Assortment entity.
     *
     * @Route("/new", name="manager_assortment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $assortment = new Assortment();
        $form = $this->createForm('Monotype\Bundle\ManagerBundle\Form\AssortmentType', $assortment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($assortment);
            $em->flush();

            return $this->redirectToRoute('manager_assortment_show', array('id' => $assortment->getId()));
        }

        return $this->render('assortment/new.html.twig', array(
            'assortment' => $assortment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Assortment entity.
     *
     * @Route("/{id}", name="manager_assortment_show")
     * @Method("GET")
     */
    public function showAction(Assortment $assortment)
    {
        $deleteForm = $this->createDeleteForm($assortment);

        return $this->render('assortment/show.html.twig', array(
            'assortment' => $assortment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Assortment entity.
     *
     * @param Assortment $assortment The Assortment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Assortment $assortment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_assortment_delete', array('id' => $assortment->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Assortment entity.
     *
     * @Route("/{id}/edit", name="manager_assortment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Assortment $assortment)
    {
        $deleteForm = $this->createDeleteForm($assortment);
        $editForm = $this->createForm('Monotype\Bundle\ManagerBundle\Form\AssortmentType', $assortment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($assortment);
            $em->flush();

            return $this->redirectToRoute('manager_assortment_edit', array('id' => $assortment->getId()));
        }

        return $this->render('assortment/edit.html.twig', array(
            'assortment' => $assortment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Assortment entity.
     *
     * @Route("/{id}", name="manager_assortment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Assortment $assortment)
    {
        $form = $this->createDeleteForm($assortment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($assortment);
            $em->flush();
        }

        return $this->redirectToRoute('manager_assortment_index');
    }
}
