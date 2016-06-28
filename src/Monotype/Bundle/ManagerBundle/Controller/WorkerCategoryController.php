<?php

namespace Monotype\Bundle\ManagerBundle\Controller;

use Monotype\Bundle\ManagerBundle\Entity\WorkerCategory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * WorkerCategory controller.
 *
 * @Route("/manager/workercategory")
 */
class WorkerCategoryController extends Controller
{
    /**
     * Lists all WorkerCategory entities.
     *
     * @Route("/", name="manager_workercategory_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $workerCategories = $em->getRepository('MonotypeManagerBundle:WorkerCategory')->findAll();

        return $this->render('workercategory/index.html.twig', array(
            'workerCategories' => $workerCategories,
        ));
    }

    /**
     * Creates a new WorkerCategory entity.
     *
     * @Route("/new", name="manager_workercategory_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $workerCategory = new WorkerCategory();
        $form = $this->createForm('Monotype\Bundle\ManagerBundle\Form\WorkerCategoryType', $workerCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($workerCategory);
            $em->flush();

            return $this->redirectToRoute('manager_workercategory_show', array('id' => $workerCategory->getId()));
        }

        return $this->render('workercategory/new.html.twig', array(
            'workerCategory' => $workerCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a WorkerCategory entity.
     *
     * @Route("/{id}", name="manager_workercategory_show")
     * @Method("GET")
     */
    public function showAction(WorkerCategory $workerCategory)
    {
        $deleteForm = $this->createDeleteForm($workerCategory);

        return $this->render('workercategory/show.html.twig', array(
            'workerCategory' => $workerCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a WorkerCategory entity.
     *
     * @param WorkerCategory $workerCategory The WorkerCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(WorkerCategory $workerCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_workercategory_delete', array('id' => $workerCategory->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing WorkerCategory entity.
     *
     * @Route("/{id}/edit", name="manager_workercategory_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, WorkerCategory $workerCategory)
    {
        $deleteForm = $this->createDeleteForm($workerCategory);
        $editForm = $this->createForm('Monotype\Bundle\ManagerBundle\Form\WorkerCategoryType', $workerCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($workerCategory);
            $em->flush();

            return $this->redirectToRoute('manager_workercategory_edit', array('id' => $workerCategory->getId()));
        }

        return $this->render('workercategory/edit.html.twig', array(
            'workerCategory' => $workerCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a WorkerCategory entity.
     *
     * @Route("/{id}", name="manager_workercategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, WorkerCategory $workerCategory)
    {
        $form = $this->createDeleteForm($workerCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($workerCategory);
            $em->flush();
        }

        return $this->redirectToRoute('manager_workercategory_index');
    }
}
