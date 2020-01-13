<?php
namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\League;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LeagueController
 * @package AppBundle\Controller\Api\v1
 */
class LeagueController extends Controller
{

  /**
   * @Route("/api/v1/createLeague", name="newLeague")
   * @Method("POST")
   */
  public function newLeagueAction(Request $request) {

    $leagueName = $request->query->get('name');

    $league = new League();
    $league->setName($leagueName);

    $em = $this->getDoctrine()->getManager();
    $em->persist($league);
    $em->flush();

    return new Response($leagueName. ' League saved', 201);

  }

  /**
   * @Route("/api/v1/listLeague", name="listLeagues")
   * @Method("GET")
   * @return Response
   */
  public function listLeaguesAction() {

    $em = $this->getDoctrine()->getManager();

    $leagues = $em->getRepository('AppBundle:League')->findAll();

    if (!$leagues) {
      throw $this->createNotFoundException('No leagues listed.');
    }

    $data = [];
    foreach ($leagues as $league){
      $teamData = [
        'League Name' => $league->getName(),
      ];
      array_push($data, $teamData);

    }

    return new Response(json_encode($data));
  }

  /**
   * @Route("/api/v1/deleteLeague/{leaguename}")
   * @param $leaguename
   * @Method("DELETE")
   * @return Response
   */
  public function deleteLeagueAction($leaguename)
  {
    $leagues = $this->getDoctrine()
      ->getRepository('AppBundle:League')
      ->findOneBy(['name' => $leaguename]);

    // Get the Doctrine service and manager
    $em = $this->getDoctrine()->getManager();
    $em->remove($leagues);
    $em->flush();

    return new Response($leaguename.' League Deleted', 201);
  }

}