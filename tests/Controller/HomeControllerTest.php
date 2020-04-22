<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class HomeControllerTest extends WebTestCase
{
    public function testShowHome()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testShowTitle() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $text = $crawler->filter('html h1:contains("Snow Tricks")')->count();
        $this->assertGreaterThan(0, $text);
    }
}