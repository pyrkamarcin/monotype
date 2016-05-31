<?php

namespace Monotype\Bundle\DirectControllBundle\Controller;

use Monotype\Bundle\DirectControllBundle\Entity\Process;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Process controller.
 *
 * @Route("/manager/process")
 */
class ProcessController extends Controller
{
    /**
     * Lists all Process entities.
     *
     * @Route("/", name="manager_process_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $processes = $em->getRepository('MonotypeDirectControllBundle:Process')->findAll();

        return $this->render('MonotypeDirectControllBundle:process:index.html.twig', array(
            'processes' => $processes,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * Creates a new Process entity.
     *
     * @Route("/new", name="manager_process_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $process = new Process();
        $form = $this->createForm('Monotype\Bundle\DirectControllBundle\Form\ProcessType', $process);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($process);
            $em->flush();

            return $this->redirectToRoute('process_show', array('id' => $process->getId()));
        }

        return $this->render('MonotypeDirectControllBundle:process:new.html.twig', array(
            'process' => $process,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Process $process
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * Finds and displays a Process entity.
     *
     * @Route("/{id}", name="manager_process_show")
     * @Method("GET")
     */
    public function showAction(Process $process)
    {
        $deleteForm = $this->createDeleteForm($process);

        return $this->render('MonotypeDirectControllBundle:process:show.html.twig', array(
            'process' => $process,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Process entity.
     *
     * @param Process $process The Process entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Process $process)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('process_delete', array('id' => $process->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @param Request $request
     * @param Process $process
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * Displays a form to edit an existing Process entity.
     *
     * @Route("/{id}/edit", name="manager_process_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Process $process)
    {
        $deleteForm = $this->createDeleteForm($process);
        $editForm = $this->createForm('Monotype\Bundle\DirectControllBundle\Form\ProcessType', $process);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($process);
            $em->flush();

            return $this->redirectToRoute('process_edit', array('id' => $process->getId()));
        }

        return $this->render('MonotypeDirectControllBundle:process:edit.html.twig', array(
            'process' => $process,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param Process $process
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * Deletes a Process entity.
     *
     * @Route("/{id}", name="manager_process_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Process $process)
    {
        $form = $this->createDeleteForm($process);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($process);
            $em->flush();
        }

        return $this->redirectToRoute('process_index');
    }
}
