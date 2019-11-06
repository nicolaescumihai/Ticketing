<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PassangerDetails;
use AppBundle\Entity\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;



/**
 * Passangerdetail controller.
 *
 * @Route("passangerdetails")
 */
class PassangerDetailsController extends Controller
{
    /**
     * Lists all passangerDetail entities.
     *
     * @Route("/", name="passangerdetails_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passangerDetails = $em->getRepository('AppBundle:PassangerDetails')->findAll();
        $planes = $em->getRepository('AppBundle:Planes')->findAll();
        $planeSeats = $em->getRepository('AppBundle:PlaneSeats')->findAll();

        return $this->render('passangerdetails/index.html.twig', array(
            'passangerDetails' => $passangerDetails,
            'planes' => $planes,
            'planeSeats' => $planeSeats,
        ));
    }

    /**
     * Creates a new passangerDetail entity.
     *
     * @Route("/new", name="passangerdetails_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $passangerDetail = new Passangerdetails();
       
        
        $form = $this->createForm('AppBundle\Form\PassangerDetailsType', $passangerDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($passangerDetail);
            
            $em->flush();

            return $this->redirectToRoute('passangerdetails_show', array('id' => $passangerDetail->getId()));
        }

        return $this->render('passangerdetails/new.html.twig', array(
            'passangerDetail' => $passangerDetail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a passangerDetail entity.
     *
     * @Route("/{id}", name="passangerdetails_show")
     * @Method("GET")
     */
    public function showAction(PassangerDetails $passangerDetail)
    {
        $deleteForm = $this->createDeleteForm($passangerDetail);

        return $this->render('passangerdetails/show.html.twig', array(
            'passangerDetail' => $passangerDetail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing passangerDetail entity.
     *
     * @Route("/{id}/edit", name="passangerdetails_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PassangerDetails $passangerDetail)
    {
        $deleteForm = $this->createDeleteForm($passangerDetail);
        $editForm = $this->createForm('AppBundle\Form\PassangerDetailsType', $passangerDetail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('passangerdetails_edit', array('id' => $passangerDetail->getId()));
        }

        return $this->render('passangerdetails/edit.html.twig', array(
            'passangerDetail' => $passangerDetail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a passangerDetail entity.
     *
     * @Route("/{id}", name="passangerdetails_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PassangerDetails $passangerDetail)
    {
        $form = $this->createDeleteForm($passangerDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($passangerDetail);
            $em->flush();
        }

        return $this->redirectToRoute('passangerdetails_index');
    }

    /**
     * Creates a form to delete a passangerDetail entity.
     *
     * @param PassangerDetails $passangerDetail The passangerDetail entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PassangerDetails $passangerDetail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('passangerdetails_delete', array('id' => $passangerDetail->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
