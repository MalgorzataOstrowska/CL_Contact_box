<?php

namespace ContactBoxBundle\Controller;

use ContactBoxBundle\Entity\Address;
use ContactBoxBundle\Form\AddressType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * @Route("/{id}/addAddress")
     * @Template("ContactBoxBundle:Address:addAddress.html.twig")
     * @Method("GET")
     */
    public function addAddressGetAction($id)
    {
        $address = new Address();
        $formAddress = $this->createForm(new AddressType(), $address);
        return ['formAddress' => $formAddress->createView()];
    }

    /**
     * @Route("/{id}/addAddress")
     * @Template("ContactBoxBundle:Address:addAddress.html.twig")
     * @Method("POST")
     */
    public function addAddressPostAction(Request $request, $id)
    {
        $address = new Address();
        $formAddress = $this->createForm(new AddressType(), $address);

        $formAddress->handleRequest($request);
        if ($formAddress->isSubmitted()) {
            $address = $formAddress->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirectToRoute('contactbox_contact_modifycontactget', ['id' => $id]);
        }
        return new Response(':-(');
    }

    /**
     * @Route("/{id}/deleteAddress")
     */
    public function deteteAddressAction($id)
    {
        return $this->render('ContactBoxBundle:Address:detete_address.html.twig', array(
            // ...
        ));
    }

}
