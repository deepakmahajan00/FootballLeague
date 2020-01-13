<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class TeamControllerTest
 * @package Tests\AppBundle\Controller
 */
class TeamControllerTest extends WebTestCase
{
  public function testCreateTeam()
  {
    $client = static::createClient();
    $teamName = "Manchester FC".rand(5, 10);
    $client->request('POST', '/api/v1/createTeam?name='.$teamName.'&strip=Green&league=World League');

    $this->assertEquals(201, $client->getResponse()->getStatusCode());
    $this->assertEquals($teamName." Team saved", $client->getResponse()->getContent());
  }

  public function testListTeamByLeague()
  {
    $client = static::createClient();
    $leagueName = 'UK Premier League';

    $client->request('GET', '/api/v1/listTeamByLeague?leaguename=UK Premier League');
    $this->assertEquals(200, $client->getResponse()->getStatusCode());
  }
}
