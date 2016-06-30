<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Monotype\Bundle\ManagerBundle\Entity\Guide;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Guide controller.
 *
 * @Route("/manager/guide")
 */
class GuideController extends Controller
{
    /**
     * Lists all Guide entities.
     *
     * @Route("/", name="manager_guide_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $guides = $em->getRepository('MonotypeManagerBundle:Guide')->findAll();

        return $this->render('guide/index.html.twig', array(
            'guides' => $guides,
        ));
    }

    /**
     * Creates a new Guide entity.
     *
     * @Route("/new", name="manager_guide_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $guide = new Guide();
        $form = $this->createForm('Monotype\Bundle\ManagerBundle\Form\GuideType', $guide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $guide->setDateAdd(new \DateTime("now"));
            $guide->setDateMod(new \DateTime("now"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($guide);
            $em->flush();

            return $this->redirectToRoute('manager_guide_show', array('id' => $guide->getId()));
        }

        return $this->render('guide/new.html.twig', array(
            'guide' => $guide,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Guide entity.
     *
     * @Route("/{id}", name="manager_guide_show")
     * @Method("GET")
     */
    public function showAction(Guide $guide)
    {
        $deleteForm = $this->createDeleteForm($guide);

        return $this->render('guide/show.html.twig', array(
            'guide' => $guide,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Guide entity.
     *
     * @param Guide $guide The Guide entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Guide $guide)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_guide_delete', array('id' => $guide->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Guide entity.
     *
     * @Route("/{id}/edit", name="manager_guide_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Guide $guide)
    {
        $deleteForm = $this->createDeleteForm($guide);
        $editForm = $this->createForm('Monotype\Bundle\ManagerBundle\Form\GuideType', $guide);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guide);
            $em->flush();

            return $this->redirectToRoute('manager_guide_edit', array('id' => $guide->getId()));
        }

        return $this->render('guide/edit.html.twig', array(
            'guide' => $guide,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Guide entity.
     *
     * @Route("/{id}", name="manager_guide_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Guide $guide)
    {
        $form = $this->createDeleteForm($guide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($guide);
            $em->flush();
        }

        return $this->redirectToRoute('manager_guide_index');
    }
}
