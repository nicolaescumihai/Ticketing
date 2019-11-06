<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AirportGates;
use AppBundle\Entity\Airports;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Airportgate controller.
 *
 * @Route("airportgates")
 */
class AirportGatesController extends Controller
{
    /**
     * Lists all airportGate entities.
     *
     * @Route("/", name="airportgates_index")
     * @Method("GET")
     */
    public function indexAction()
    {
       
        $em = $this->getDoctrine()->getManager();
       
        $airportGates = $em->getRepository('AppBundle:AirportGates')->findAll();
        $airports = $em->getRepository('AppBundle:Airports')->findAll();


        return $this->render('airportgates/index.html.twig', array(
            'airportGates' => $airportGates,
            'airports' => $airports,
        ));
    }

    /**
     * Creates a new airportGate entity.
     *
     * @Route("/new", name="airportgates_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $airportGate = new Airportgates();
        $form = $this->createForm('AppBundle\Form\AirportGatesType', $airportGate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airportGate);
            $em->flush();

            return $this->redirectToRoute('airportgates_show', array('id' => $airportGate->getId()));
        }


        return $this->render('airportgates/new.html.twig', array(
            'airportGate' => $airportGate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a airportGate entity.
     *
     * @Route("/{id}", name="airportgates_show")
     * @Method("GET")
     */
    public function showAction(AirportGates $airportGate)
    {
        $deleteForm = $this->createDeleteForm($airportGate);

        return $this->render('airportgates/show.html.twig', array(
            'airportGate' => $airportGate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing airportGate entity.
     *
     * @Route("/{id}/edit", name="airportgates_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AirportGates $airportGate)
    {
        $deleteForm = $this->createDeleteForm($airportGate);
        $editForm = $this->createForm('AppBundle\Form\AirportGatesType', $airportGate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('airportgates_edit', array('id' => $airportGate->getId()));
        }

        return $this->render('airportgates/edit.html.twig', array(
            'airportGate' => $airportGate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a airportGate entity.
     *
     * @Route("/{id}", name="airportgates_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AirportGates $airportGate)
    {
        $form = $this->createDeleteForm($airportGate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($airportGate);
            $em->flush();
        }

        return $this->redirectToRoute('airportgates_index');
    }

    /**
     * Creates a form to delete a airportGate entity.
     *
     * @param AirportGates $airportGate The airportGate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AirportGates $airportGate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('airportgates_delete', array('id' => $airportGate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
