<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class LeagueControllerTest
 * @package Tests\AppBundle\Controller
 */
class LeagueControllerTest extends WebTestCase
{
  public function testNewLeague()
  {
    $client = static::createClient();

    $leagueName = 'World League 1';

    $client->request('POST', '/api/v1/createLeague?name='.$leagueName);

    $this->assertEquals(201, $client->getResponse()->getStatusCode());
    $this->assertEquals($leagueName . ' League saved', $client->getResponse()->getContent());
  }

  public function testListLeagues()
  {
    $client = static::createClient();

    $client->request('GET', '/api/v1/listLeague');
    $this->assertEquals(200, $client->getResponse()->getStatusCode());
  }

  public function testDeleteLeague()
  {
    $client = static::createClient();

    $leagueName = 'World League 1';

    $client->request('DELETE', '/api/v1/deleteLeague/'.$leagueName);
    $this->assertEquals(201, $client->getResponse()->getStatusCode());
  }
}
