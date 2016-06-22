<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Monotype\Bundle\ManagerBundle\Entity\Worker;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Worker controller.
 *
 * @Route("/manager/worker")
 */
class WorkerController extends Controller
{
    /**
     * Lists all Worker entities.
     *
     * @Route("/", name="manager_worker_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $workers = $em->getRepository('MonotypeManagerBundle:Worker')->findAll();

        return $this->render('worker/index.html.twig', array(
            'workers' => $workers,
        ));
    }

    /**
     * Creates a new Worker entity.
     *
     * @Route("/new", name="manager_worker_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $worker = new Worker();
        $form = $this->createForm('Monotype\Bundle\ManagerBundle\Form\WorkerType', $worker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($worker);
            $em->flush();

            return $this->redirectToRoute('manager_worker_show', array('id' => $worker->getId()));
        }

        return $this->render('worker/new.html.twig', array(
            'worker' => $worker,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Worker entity.
     *
     * @Route("/{id}", name="manager_worker_show")
     * @Method("GET")
     */
    public function showAction(Worker $worker)
    {
        $deleteForm = $this->createDeleteForm($worker);

        return $this->render('worker/show.html.twig', array(
            'worker' => $worker,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Worker entity.
     *
     * @param Worker $worker The Worker entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Worker $worker)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_worker_delete', array('id' => $worker->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Worker entity.
     *
     * @Route("/{id}/edit", name="manager_worker_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Worker $worker)
    {
        $deleteForm = $this->createDeleteForm($worker);
        $editForm = $this->createForm('Monotype\Bundle\ManagerBundle\Form\WorkerType', $worker);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($worker);
            $em->flush();

            return $this->redirectToRoute('manager_worker_edit', array('id' => $worker->getId()));
        }

        return $this->render('worker/edit.html.twig', array(
            'worker' => $worker,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Worker entity.
     *
     * @Route("/{id}", name="manager_worker_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Worker $worker)
    {
        $form = $this->createDeleteForm($worker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($worker);
            $em->flush();
        }

        return $this->redirectToRoute('manager_worker_index');
    }
}
