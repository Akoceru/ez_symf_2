<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/category');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'category/create');
    }

}
