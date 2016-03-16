<?php

namespace Monotype\Bundle\BowmanBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Monotype\Bundle\BowmanBundle\Entity\Machines;
use Monotype\Bundle\BowmanBundle\Form\MachinesType;

/**
 * Machines controller.
 *
 * @Route("/machines")
 */
class MachinesController extends Controller
{
    /**
     * Lists all Machines entities.
     *
     * @Route("/", name="machines_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $machines = $em->getRepository('MonotypeBowmanBundle:Machines')->findAll();

        return $this->render('machines/index.html.twig', array(
            'machines' => $machines,
        ));
    }

    /**
     * Creates a new Machines entity.
     *
     * @Route("/new", name="machines_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $machine = new Machines();
        $form = $this->createForm('Monotype\Bundle\BowmanBundle\Form\MachinesType', $machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('machines_show', array('id' => $machine->getId()));
        }

        return $this->render('machines/new.html.twig', array(
            'machine' => $machine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Machines entity.
     *
     * @Route("/{id}", name="machines_show")
     * @Method("GET")
     */
    public function showAction(Machines $machine)
    {
        $deleteForm = $this->createDeleteForm($machine);

        return $this->render('machines/show.html.twig', array(
            'machine' => $machine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Machines entity.
     *
     * @Route("/{id}/edit", name="machines_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Machines $machine)
    {
        $deleteForm = $this->createDeleteForm($machine);
        $editForm = $this->createForm('Monotype\Bundle\BowmanBundle\Form\MachinesType', $machine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('machines_edit', array('id' => $machine->getId()));
        }

        return $this->render('machines/edit.html.twig', array(
            'machine' => $machine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Machines entity.
     *
     * @Route("/{id}", name="machines_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Machines $machine)
    {
        $form = $this->createDeleteForm($machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($machine);
            $em->flush();
        }

        return $this->redirectToRoute('machines_index');
    }

    /**
     * Creates a form to delete a Machines entity.
     *
     * @param Machines $machine The Machines entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Machines $machine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('machines_delete', array('id' => $machine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
