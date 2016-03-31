<?php

namespace Monotype\Bundle\BowmanBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SynchroControllerTest extends WebTestCase
{
    public function testShowdiff()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/synchro/showdiff');
    }

}
