<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Monotype\Bundle\ManagerBundle\Entity\Technology;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Technology controller.
 *
 * @Route("/manager/technology")
 */
class TechnologyController extends Controller
{
    /**
     * Lists all Technology entities.
     *
     * @Route("/", name="manager_technology_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $technologies = $em->getRepository('MonotypeManagerBundle:Technology')->findAll();

        return $this->render('technology/index.html.twig', array(
            'technologies' => $technologies,
        ));
    }

    /**
     * Creates a new Technology entity.
     *
     * @Route("/new", name="manager_technology_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $technology = new Technology();
        $form = $this->createForm('Monotype\Bundle\ManagerBundle\Form\TechnologyType', $technology);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $technology->setAddDate(new \DateTime("now"));
            $technology->setModDate(new \DateTime("now"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($technology);
            $em->flush();

            return $this->redirectToRoute('manager_technology_show', array('id' => $technology->getId()));
        }

        return $this->render('technology/new.html.twig', array(
            'technology' => $technology,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Technology entity.
     *
     * @Route("/{id}", name="manager_technology_show")
     * @Method("GET")
     */
    public function showAction(Technology $technology)
    {
        $deleteForm = $this->createDeleteForm($technology);

        return $this->render('technology/show.html.twig', array(
            'technology' => $technology,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Technology entity.
     *
     * @param Technology $technology The Technology entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Technology $technology)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_technology_delete', array('id' => $technology->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Technology entity.
     *
     * @Route("/{id}/edit", name="manager_technology_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Technology $technology)
    {
        $deleteForm = $this->createDeleteForm($technology);
        $editForm = $this->createForm('Monotype\Bundle\ManagerBundle\Form\TechnologyType', $technology);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $technology->setModDate(new \DateTime("now"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($technology);
            $em->flush();

            return $this->redirectToRoute('manager_technology_edit', array('id' => $technology->getId()));
        }

        return $this->render('technology/edit.html.twig', array(
            'technology' => $technology,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Technology entity.
     *
     * @Route("/{id}", name="manager_technology_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Technology $technology)
    {
        $form = $this->createDeleteForm($technology);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($technology);
            $em->flush();
        }

        return $this->redirectToRoute('manager_technology_index');
    }
}
