<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PlaneSeats;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Planeseat controller.
 *
 * @Route("planeseats")
 */
class PlaneSeatsController extends Controller
{
    /**
     * Lists all planeSeat entities.
     *
     * @Route("/", name="planeseats_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $planeSeats = $em->getRepository('AppBundle:PlaneSeats')->findAll();

        return $this->render('planeseats/index.html.twig', array(
            'planeSeats' => $planeSeats,
        ));
    }

    /**
     * Creates a new planeSeat entity.
     *
     * @Route("/new", name="planeseats_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $planeSeat = new Planeseats();
        $form = $this->createForm('AppBundle\Form\PlaneSeatsType', $planeSeat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($planeSeat);
            $em->flush();

            return $this->redirectToRoute('planeseats_show', array('id' => $planeSeat->getId()));
        }

        return $this->render('planeseats/new.html.twig', array(
            'planeSeat' => $planeSeat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a planeSeat entity.
     *
     * @Route("/{id}", name="planeseats_show")
     * @Method("GET")
     */
    public function showAction(PlaneSeats $planeSeat)
    {
        $deleteForm = $this->createDeleteForm($planeSeat);

        return $this->render('planeseats/show.html.twig', array(
            'planeSeat' => $planeSeat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing planeSeat entity.
     *
     * @Route("/{id}/edit", name="planeseats_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PlaneSeats $planeSeat)
    {
        $deleteForm = $this->createDeleteForm($planeSeat);
        $editForm = $this->createForm('AppBundle\Form\PlaneSeatsType', $planeSeat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planeseats_edit', array('id' => $planeSeat->getId()));
        }

        return $this->render('planeseats/edit.html.twig', array(
            'planeSeat' => $planeSeat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a planeSeat entity.
     *
     * @Route("/{id}", name="planeseats_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PlaneSeats $planeSeat)
    {
        $form = $this->createDeleteForm($planeSeat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($planeSeat);
            $em->flush();
        }

        return $this->redirectToRoute('planeseats_index');
    }

    /**
     * Creates a form to delete a planeSeat entity.
     *
     * @param PlaneSeats $planeSeat The planeSeat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlaneSeats $planeSeat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('planeseats_delete', array('id' => $planeSeat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
