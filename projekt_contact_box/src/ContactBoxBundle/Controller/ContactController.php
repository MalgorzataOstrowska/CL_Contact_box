<?php

namespace ContactBoxBundle\Controller;

use ContactBoxBundle\Entity\Address;
use ContactBoxBundle\Form\AddressType;
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
     * @Template("ContactBoxBundle:Contact:modifyContact.html.twig")
     * @Method("GET")
     */
    public function modifyContactGetAction(Request $request, $id)
    {
        $contact = $this
            ->getDoctrine()
            ->getRepository('ContactBoxBundle:Contact')
            ->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Contact not found');
        }

        $form = $this->createForm(new ContactType(), $contact);

        return ['form' => $form->createView(), 'id' => $id];
    }

    /**
     * @Route("/{id}/modify")
     * @Template("ContactBoxBundle:Contact:modifyContact.html.twig")
     * @Method("POST")
     */
    public function modifyContactPostAction(Request $request, $id)
    {
        $contact = $this
            ->getDoctrine()
            ->getRepository('ContactBoxBundle:Contact')
            ->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Contact not found');
        }

        $form = $this->createForm(new ContactType(), $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this
                ->getDoctrine()
                ->getManager();

            $em->flush();

            return $this->redirectToRoute(
                'contactbox_contact_showcontact',
                [
                    'id' => $contact->getId()
                ]
            );
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/{id}/delete")
     */
    public function deleteContactAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $contact =$em->getRepository('ContactBoxBundle:Contact')->find($id);

        if(!$contact){
            throw $this->createNotFoundException('Contact not found');
        }

        $em->remove($contact);
        $em->flush();

        return $this->redirectToRoute('contactbox_contact_showallcontacts');
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

        if($contact->getAddress()){
            $address = $contact->getAddress()->getId();
        } else {
            $address = '';
        }
//        return new Response(':-)');
        return ['contact' => $contact, 'form' => $form->createView(), 'address' => $address];
    }

    /**
     * @Route("/")
     * @Template("ContactBoxBundle:Contact:showAllContacts.html.twig")
     */
    public function showAllContactsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
                FROM ContactBoxBundle:Contact p
                WHERE p.id > 1
                ORDER BY p.firstName ASC'
        );

        $contacts = $query->getResult();

        $form = $this->createForm(new ContactType());

        return ['contacts' => $contacts, 'form' => $form->createView()];
    }

}
