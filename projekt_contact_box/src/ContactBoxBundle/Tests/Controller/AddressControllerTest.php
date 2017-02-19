<?php

namespace ContactBoxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddressControllerTest extends WebTestCase
{
    public function testAddaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}/addAddress');
    }

    public function testDeteteaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}/deleteAddress');
    }

}
