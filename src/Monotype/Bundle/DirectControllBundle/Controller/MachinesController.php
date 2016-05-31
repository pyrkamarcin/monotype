<?php

namespace Monotype\Bundle\DirectControllBundle\Controller;

use Monotype\Bundle\DirectControllBundle\Entity\Machines;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Machines controller.
 *
 * @Route("/manager/machines")
 */
class MachinesController extends Controller
{
    /**
     * Lists all Machines entities.
     *
     * @Route("/", name="manager_machines_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $machines = $em->getRepository('MonotypeDirectControllBundle:Machines')->findAll();

        return $this->render('MonotypeDirectControllBundle:machines:index.html.twig', array(
            'machines' => $machines,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * Creates a new Machines entity.
     *
     * @Route("/new", name="manager_machines_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $machine = new Machines();
        $form = $this->createForm('Monotype\Bundle\DirectControllBundle\Form\MachinesType', $machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('machines_show', array('id' => $machine->getId()));
        }

        return $this->render('MonotypeDirectControllBundle:machines:new.html.twig', array(
            'machine' => $machine,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Machines $machine
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * Finds and displays a Machines entity.
     *
     * @Route("/{id}", name="manager_machines_show")
     * @Method("GET")
     */
    public function showAction(Machines $machine)
    {
        $deleteForm = $this->createDeleteForm($machine);

        return $this->render('MonotypeDirectControllBundle:machines:show.html.twig', array(
            'machine' => $machine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Machines $machine
     * @return \Symfony\Component\Form\Form
     *
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
            ->getForm();
    }

    /**
     * @param Request $request
     * @param Machines $machine
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * Displays a form to edit an existing Machines entity.
     *
     * @Route("/{id}/edit", name="manager_machines_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Machines $machine)
    {
        $deleteForm = $this->createDeleteForm($machine);
        $editForm = $this->createForm('Monotype\Bundle\DirectControllBundle\Form\MachinesType', $machine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('machines_edit', array('id' => $machine->getId()));
        }

        return $this->render('MonotypeDirectControllBundle:machines:edit.html.twig', array(
            'machine' => $machine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param Machines $machine
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     *
     * Deletes a Machines entity.
     *
     * @Route("/{id}", name="manager_machines_delete")
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
}
