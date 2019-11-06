<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Airports;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Airport controller.
 *
 * @Route("airports")
 */
class AirportsController extends Controller
{
    /**
     * Lists all airport entities.
     *
     * @Route("/", name="airports_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $airports = $em->getRepository('AppBundle:Airports')->findAll();

        return $this->render('airports/index.html.twig', array(
            'airports' => $airports,
        ));
    }

    /**
     * Creates a new airport entity.
     *
     * @Route("/new", name="airports_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $airport = new Airports();
        $form = $this->createForm('AppBundle\Form\AirportsType', $airport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airport);
            $em->flush();

            return $this->redirectToRoute('airports_show', array('id' => $airport->getId()));
        }

        return $this->render('airports/new.html.twig', array(
            'airport' => $airport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a airport entity.
     *
     * @Route("/{id}", name="airports_show")
     * @Method("GET")
     */
    public function showAction(Airports $airport)
    {
        $deleteForm = $this->createDeleteForm($airport);

        return $this->render('airports/show.html.twig', array(
            'airport' => $airport,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing airport entity.
     *
     * @Route("/{id}/edit", name="airports_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Airports $airport)
    {
        $deleteForm = $this->createDeleteForm($airport);
        $editForm = $this->createForm('AppBundle\Form\AirportsType', $airport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('airports_edit', array('id' => $airport->getId()));
        }

        return $this->render('airports/edit.html.twig', array(
            'airport' => $airport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a airport entity.
     *
     * @Route("/{id}", name="airports_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Airports $airport)
    {
        $form = $this->createDeleteForm($airport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($airport);
            $em->flush();
        }

        return $this->redirectToRoute('airports_index');
    }

    /**
     * Creates a form to delete a airport entity.
     *
     * @param Airports $airport The airport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Airports $airport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('airports_delete', array('id' => $airport->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
