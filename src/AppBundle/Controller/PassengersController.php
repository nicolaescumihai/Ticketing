<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Passengers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Passenger controller.
 *
 * @Route("passengers")
 */
class PassengersController extends Controller
{
    /**
     * Lists all passenger entities.
     *
     * @Route("/", name="passengers_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passengers = $em->getRepository('AppBundle:Passengers')->findAll();

        return $this->render('passengers/index.html.twig', array(
            'passengers' => $passengers,
        ));
    }

    /**
     * Creates a new passenger entity.
     *
     * @Route("/new", name="passengers_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $passenger = new Passengers();
        $form = $this->createForm('AppBundle\Form\PassengersType', $passenger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($passenger);
            $em->flush();

            return $this->redirectToRoute('passengers_show', array('id' => $passenger->getId()));
        }

        return $this->render('passengers/new.html.twig', array(
            'passenger' => $passenger,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a passenger entity.
     *
     * @Route("/{id}", name="passengers_show")
     * @Method("GET")
     */
    public function showAction(Passengers $passenger)
    {
        $deleteForm = $this->createDeleteForm($passenger);

        return $this->render('passengers/show.html.twig', array(
            'passenger' => $passenger,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing passenger entity.
     *
     * @Route("/{id}/edit", name="passengers_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Passengers $passenger)
    {
        $deleteForm = $this->createDeleteForm($passenger);
        $editForm = $this->createForm('AppBundle\Form\PassengersType', $passenger);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('passengers_edit', array('id' => $passenger->getId()));
        }

        return $this->render('passengers/edit.html.twig', array(
            'passenger' => $passenger,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a passenger entity.
     *
     * @Route("/{id}", name="passengers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Passengers $passenger)
    {
        $form = $this->createDeleteForm($passenger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($passenger);
            $em->flush();
        }

        return $this->redirectToRoute('passengers_index');
    }

    /**
     * Creates a form to delete a passenger entity.
     *
     * @param Passengers $passenger The passenger entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Passengers $passenger)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('passengers_delete', array('id' => $passenger->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
