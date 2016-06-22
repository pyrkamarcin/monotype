<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Monotype\Bundle\ManagerBundle\Entity\Operation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Operation controller.
 *
 * @Route("/manager/operation")
 */
class OperationController extends Controller
{
    /**
     * Lists all Operation entities.
     *
     * @Route("/", name="manager_operation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operations = $em->getRepository('MonotypeManagerBundle:Operation')->findAll();

        return $this->render('operation/index.html.twig', array(
            'operations' => $operations,
        ));
    }

    /**
     * Creates a new Operation entity.
     *
     * @Route("/new", name="manager_operation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $operation = new Operation();
        $form = $this->createForm('Monotype\Bundle\ManagerBundle\Form\OperationType', $operation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operation);
            $em->flush();

            return $this->redirectToRoute('manager_operation_show', array('id' => $operation->getId()));
        }

        return $this->render('operation/new.html.twig', array(
            'operation' => $operation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Operation entity.
     *
     * @Route("/{id}", name="manager_operation_show")
     * @Method("GET")
     */
    public function showAction(Operation $operation)
    {
        $deleteForm = $this->createDeleteForm($operation);

        return $this->render('operation/show.html.twig', array(
            'operation' => $operation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Operation entity.
     *
     * @param Operation $operation The Operation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Operation $operation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_operation_delete', array('id' => $operation->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Operation entity.
     *
     * @Route("/{id}/edit", name="manager_operation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Operation $operation)
    {
        $deleteForm = $this->createDeleteForm($operation);
        $editForm = $this->createForm('Monotype\Bundle\ManagerBundle\Form\OperationType', $operation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operation);
            $em->flush();

            return $this->redirectToRoute('manager_operation_edit', array('id' => $operation->getId()));
        }

        return $this->render('operation/edit.html.twig', array(
            'operation' => $operation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Operation entity.
     *
     * @Route("/{id}", name="manager_operation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Operation $operation)
    {
        $form = $this->createDeleteForm($operation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operation);
            $em->flush();
        }

        return $this->redirectToRoute('manager_operation_index');
    }
}
