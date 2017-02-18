<?php

namespace ContactBoxBundle\Controller;

use ContactBoxBundle\Form\ContactType;
use ContactBoxBundle\Form\TweetType;
use ContactBoxBundle\Entity\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/new")
     * @Template("ContactBoxBundle:Contact:newContact.html.twig")
     * @Method("GET")
     */
    public function newContactGetAction()
    {
        $contact = new Contact();

        $form = $this->createForm(new ContactType(), $contact);
        return ['form' => $form->createView()];
    }

    /**
     * @Route("/new")
     * @Template("ContactBoxBundle:Contact:newContact.html.twig")
     * @Method("POST")
     */
    public function newContactPostAction(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(new ContactType(), $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $contact = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contactbox_contact_showcontact', ['id' => $contact->getId()]);
        }
    }

    /**
     * @Route("/{id}/modify")
     */
    public function modifyContactGetAction()
    {
        return $this->render('ContactBoxBundle:Contact:modifyContact.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/modify")
     */
    public function modifyContactPostAction()
    {
        return $this->render('ContactBoxBundle:Contact:modifyContact.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/delete")
     */
    public function deleteContactGetAction($id)
    {
        return $this->render('ContactBoxBundle:Contact:deleteContact.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/delete")
     */
    public function deleteContactPostAction($id)
    {
        return $this->render('ContactBoxBundle:Contact:deleteContact.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}")
     * @Template("ContactBoxBundle:Contact:showContact.html.twig")
     */
    public function showContactAction($id)
    {
        $contact =$this->getDoctrine()->getRepository('ContactBoxBundle:Contact')->find($id);

        if(!$contact){
            throw $this->createNotFoundException('Contact not found');
        }

        $form = $this->createForm(new ContactType());

        return ['contact' => $contact, 'form' => $form->createView()];
    }

    /**
     * @Route("/")
     */
    public function showAllContactsAction()
    {
        return $this->render('ContactBoxBundle:Contact:showAllContacts.html.twig', array(
            // ...
        ));
    }

}
