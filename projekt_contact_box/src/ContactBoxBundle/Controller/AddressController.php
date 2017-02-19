<?php

namespace ContactBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AddressController extends Controller
{
    /**
     * @Route("/{id}/addAddress")
     */
    public function addAddressAction($id)
    {
        return $this->render('ContactBoxBundle:Address:addAddress.html.twig', array(
            // ...
        ));
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
