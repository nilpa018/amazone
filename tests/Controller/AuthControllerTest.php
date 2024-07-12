<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextSame('h1', 'Login');
        $this->assertSelectorExists('.form-group');
    }

    public function testAuth()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        // Vérifier que la page de connexion s'affiche correctement
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('button[type=submit]', 'Login');

        // Soumettre le formulaire avec des données POST
        $form = $crawler->selectButton('Login')->form([
            '_username' => 'nilpa018@yahoo.fr',
            '_password' => '12345',
        ]);

        $client->submit($form);

        // $crawler = $client->request('GET', '/');

        $this->assertResponseRedirects('');
        $this->assertResponseIsSuccessful();
        $client->followRedirect();
        $crawler = $client->request('GET', '/articles/');
        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextSame('h1', 'Articles index');
        $client->followRedirect();
        // $this->assertSelectorExists('.user');
        $this->assertSelectorTextContains('.user', 'nilpa018@yahoo.fr');
    }
}
