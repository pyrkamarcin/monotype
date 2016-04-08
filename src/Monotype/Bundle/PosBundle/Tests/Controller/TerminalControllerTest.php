<?php

namespace Monotype\Bundle\PosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TerminalControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testDashboard()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/dashboard');
    }

    public function testLock()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lock');
    }

}
