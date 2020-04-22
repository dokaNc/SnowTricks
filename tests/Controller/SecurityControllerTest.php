<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    // failure test case
    public function testLoginFailure() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Login')->form();
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        $alert = $crawler->filter('.alert.alert-danger')->count();
        $this->assertGreaterThan(0, $alert);
    }

    // success test case
    public function testLoginSuccess() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Login')->form([
            'username' => 'dokan59',
            'password' => '28469c'
        ]);
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        $alert = $crawler->filter('.msg.msg-info')->count();
        $this->assertGreaterThan(0, $alert);
    }
}