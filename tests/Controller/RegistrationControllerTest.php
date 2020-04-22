<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    // failure test case
    public function testRegisterFailure() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form([
            'registration_form[username]' => 'username',
            'registration_form[email]' => 'email',
            'registration_form[plainPassword]' => 'pass'
        ]);
        //fwrite(STDERR, print_r($form['registration_form'], TRUE));
        $crawler = $client->submit($form);
        $alert = $crawler->filter('.form-error-message')->count();
        $this->assertGreaterThan(0, $alert);
    }

    // success test case
    public function testRegisterSuccess() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form([
            'registration_form[username]' => 'username',
            'registration_form[email]' => 'test@email.com',
            'registration_form[plainPassword]' => 'password'
        ]);
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        $alert = $crawler->filter('.msg-info')->count();
        $this->assertGreaterThan(0, $alert);
    }

}