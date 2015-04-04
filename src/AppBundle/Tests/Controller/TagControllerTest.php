<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TagControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tag/show');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tag/create');
    }

}
