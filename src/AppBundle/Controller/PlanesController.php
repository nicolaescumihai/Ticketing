<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Planes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Plane controller.
 *
 * @Route("planes")
 */
class PlanesController extends Controller
{
    /**
     * Lists all plane entities.
     *
     * @Route("/", name="planes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $planes = $em->getRepository('AppBundle:Planes')->findAll();

        return $this->render('planes/index.html.twig', array(
            'planes' => $planes,
        ));
    }

    /**
     * Creates a new plane entity.
     *
     * @Route("/new", name="planes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $plane = new Planes();
        $form = $this->createForm('AppBundle\Form\PlanesType', $plane);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plane);
            $em->flush();

            return $this->redirectToRoute('planes_show', array('id' => $plane->getId()));
        }

        return $this->render('planes/new.html.twig', array(
            'plane' => $plane,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plane entity.
     *
     * @Route("/{id}", name="planes_show")
     * @Method("GET")
     */
    public function showAction(Planes $plane)
    {
        $deleteForm = $this->createDeleteForm($plane);

        return $this->render('planes/show.html.twig', array(
            'plane' => $plane,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plane entity.
     *
     * @Route("/{id}/edit", name="planes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Planes $plane)
    {
        $deleteForm = $this->createDeleteForm($plane);
        $editForm = $this->createForm('AppBundle\Form\PlanesType', $plane);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planes_edit', array('id' => $plane->getId()));
        }

        return $this->render('planes/edit.html.twig', array(
            'plane' => $plane,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plane entity.
     *
     * @Route("/{id}", name="planes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Planes $plane)
    {
        $form = $this->createDeleteForm($plane);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plane);
            $em->flush();
        }

        return $this->redirectToRoute('planes_index');
    }

    /**
     * Creates a form to delete a plane entity.
     *
     * @param Planes $plane The plane entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Planes $plane)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('planes_delete', array('id' => $plane->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
