<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Monotype\Bundle\ManagerBundle\Entity\Dimension;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Dimension controller.
 *
 * @Route("/manager/dimension")
 */
class DimensionController extends Controller
{
    /**
     * Lists all Dimension entities.
     *
     * @Route("/", name="manager_dimension_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dimensions = $em->getRepository('MonotypeManagerBundle:Dimension')->findAll();

        return $this->render('MonotypeManagerBundle:dimension:index.html.twig', array(
            'dimensions' => $dimensions,
        ));
    }

    /**
     * Creates a new Dimension entity.
     *
     * @Route("/new", name="manager_dimension_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dimension = new Dimension();
        $form = $this->createForm('Monotype\Bundle\ManagerBundle\Form\DimensionType', $dimension);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $dimension->setDateAdd(new \DateTime("now"));
            $dimension->setDateMod(new \DateTime("now"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($dimension);
            $em->flush();

            return $this->redirectToRoute('manager_dimension_show', array('id' => $dimension->getId()));
        }

        return $this->render('MonotypeManagerBundle:dimension:new.html.twig', array(
            'dimension' => $dimension,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Dimension entity.
     *
     * @Route("/{id}", name="manager_dimension_show")
     * @Method("GET")
     */
    public function showAction(Dimension $dimension)
    {
        $deleteForm = $this->createDeleteForm($dimension);

        return $this->render('MonotypeManagerBundle:dimension:show.html.twig', array(
            'dimension' => $dimension,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Dimension entity.
     *
     * @param Dimension $dimension The Dimension entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dimension $dimension)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_dimension_delete', array('id' => $dimension->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Dimension entity.
     *
     * @Route("/{id}/edit", name="manager_dimension_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Dimension $dimension)
    {
        $deleteForm = $this->createDeleteForm($dimension);
        $editForm = $this->createForm('Monotype\Bundle\ManagerBundle\Form\DimensionType', $dimension);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $dimension->setDateMod(new \DateTime("now"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($dimension);
            $em->flush();

            return $this->redirectToRoute('manager_dimension_edit', array('id' => $dimension->getId()));
        }

        return $this->render('MonotypeManagerBundle:dimension:edit.html.twig', array(
            'dimension' => $dimension,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Dimension entity.
     *
     * @Route("/{id}", name="manager_dimension_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Dimension $dimension)
    {
        $form = $this->createDeleteForm($dimension);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dimension);
            $em->flush();
        }

        return $this->redirectToRoute('manager_dimension_index');
    }
}
