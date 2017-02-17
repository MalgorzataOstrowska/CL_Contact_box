<?php

namespace ContactBoxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testNewcontactget()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');
    }

    public function testNewcontactpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');
    }

    public function testModifycontactget()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modify');
    }

    public function testModifycontactpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modify');
    }

    public function testDeletecontactget()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}/delete');
    }

    public function testDeletecontactpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}/delete');
    }

    public function testShowcontact()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}');
    }

    public function testShowallcontacts()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

}
