<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TicketDetails;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ticketdetail controller.
 *
 * @Route("ticketdetails")
 */
class TicketDetailsController extends Controller
{
    /**
     * Lists all ticketDetail entities.
     *
     * @Route("/", name="ticketdetails_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ticketDetails = $em->getRepository('AppBundle:TicketDetails')->findAll();
        $tickets = $em->getRepository('AppBundle:Tickets')->findAll();
        $airportGates = $em->getRepository('AppBundle:AirportGates')->findAll();
        $airports = $em->getRepository('AppBundle:Airports')->findAll();
        $passengers = $em->getRepository('AppBundle:Passengers')->findAll();
        $passangerDetails = $em->getRepository('AppBundle:PassangerDetails')->findAll();

        return $this->render('ticketdetails/index.html.twig', array(
            'ticketDetails' => $ticketDetails,
            'tickets' => $tickets,
            'airports' =>$airports,
            'airportGates' => $airportGates,
            'passengers' => $passengers,
            'passangerDetails' => $passangerDetails,
        ));
    }

    /**
     * Creates a new ticketDetail entity.
     *
     * @Route("/new", name="ticketdetails_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ticketDetail = new Ticketdetails();
        $form = $this->createForm('AppBundle\Form\TicketDetailsType', $ticketDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticketDetail);
            $em->flush();

            return $this->redirectToRoute('ticketdetails_show', array('id' => $ticketDetail->getId()));
        }

        return $this->render('ticketdetails/new.html.twig', array(
            'ticketDetail' => $ticketDetail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ticketDetail entity.
     *
     * @Route("/{id}", name="ticketdetails_show")
     * @Method("GET")
     */
    public function showAction(TicketDetails $ticketDetail)
    {
        $deleteForm = $this->createDeleteForm($ticketDetail);

        return $this->render('ticketdetails/show.html.twig', array(
            'ticketDetail' => $ticketDetail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ticketDetail entity.
     *
     * @Route("/{id}/edit", name="ticketdetails_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TicketDetails $ticketDetail)
    {
        $deleteForm = $this->createDeleteForm($ticketDetail);
        $editForm = $this->createForm('AppBundle\Form\TicketDetailsType', $ticketDetail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ticketdetails_edit', array('id' => $ticketDetail->getId()));
        }

        return $this->render('ticketdetails/edit.html.twig', array(
            'ticketDetail' => $ticketDetail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ticketDetail entity.
     *
     * @Route("/{id}", name="ticketdetails_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TicketDetails $ticketDetail)
    {
        $form = $this->createDeleteForm($ticketDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ticketDetail);
            $em->flush();
        }

        return $this->redirectToRoute('ticketdetails_index');
    }

    /**
     * Creates a form to delete a ticketDetail entity.
     *
     * @param TicketDetails $ticketDetail The ticketDetail entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TicketDetails $ticketDetail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticketdetails_delete', array('id' => $ticketDetail->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
