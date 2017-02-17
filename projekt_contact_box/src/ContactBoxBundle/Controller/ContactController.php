<?php

namespace ContactBoxBundle\Controller;

use ContactBoxBundle\Form\ContactType;
use ContactBoxBundle\Form\TweetType;
use ContactBoxBundle\Entity\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactController extends Controller
{
    /**
     * @Route("/new")
     * @Template("ContactBoxBundle:Contact:newContact.html.twig")
     */
    public function newContactGetAction()
    {
        $contact = new Contact();

        $form = $this->createForm(new ContactType(), $contact);
        return ['form' => $form->createView()];
    }

    /**
     * @Route("/new")
     */
    public function newContactPostAction()
    {
        return $this->render('ContactBoxBundle:Contact:newContact.html.twig', array(
            // ...
        ));
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
     */
    public function showContactAction($id)
    {
        return $this->render('ContactBoxBundle:Contact:showContact.html.twig', array(
            // ...
        ));
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
