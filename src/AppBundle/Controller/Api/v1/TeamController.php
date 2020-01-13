<?php
namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TeamController
 * @package AppBundle\Controller\Api\v1
 */
class TeamController extends Controller
{

  /**
   * @Route("/api/v1/createTeam")
   * @Method("POST")
   */
  public function createTeamAction(Request $request) {
    $name = $request->query->get('name');
    $strip = $request->query->get('strip');
    $league = $request->query->get('league');

    $league = $this->getDoctrine()
      ->getRepository('AppBundle:League')
      ->findOneBy(['name' => $league]);

    $team = new Team();

    $em = $this->getDoctrine()->getManager();
    $teamObj = $em->getRepository('AppBundle:Team')
      ->findOneBy(['name' => $name]);

    if ($teamObj == null) {

      $team->setName($name);
      $team->setStrip($strip);
      $team->setLeague($league);

      $em = $this->getDoctrine()->getManager();
      $em->persist($team);
      $em->flush();

      return new Response($name. ' Team saved', 201);
    } else {

      $team->setName($teamObj->getName());

      // validate using the validator service
      $validator = $this->get('validator');
      $errors = $validator->validate($team);
      $errorsString = '';
      if (count($errors) > 0) {
        // custom error handling, e.g. returning failure jsonreponse, etc.
        $errorsString = (string) $errors;
      }

      return new Response($errorsString, 500);
    }
  }

  /**
   * @Route("/api/v1/listTeamByLeague")
   * @Method("GET")
   * @param $leaguename
   * @return Response
   */
  public function listTeamByLeagueAction(Request $request) {

    $league = $this->getDoctrine()
      ->getRepository('AppBundle:League')
      ->findOneBy(['name' => $request->get('leaguename')]);

    $teams = $this->getDoctrine()
      ->getRepository('AppBundle:Team')
      ->findBy(['league' => $league]);

    $data = [];
    foreach ($teams as $team){
      $teamData = [
        'team' => $team->getName(),
        'strip' => $team->getStrip(),
        'league' => $team->getLeague()->getName(),
      ];
      array_push($data, $teamData);

    }

    return new Response(json_encode($data));
  }

  /**
   * @Route("/api/v1/updateTeam")
   * @Method("POST")
   * @param Request $request
   * @return Response
   */
  public function updateTeamAction(Request $request)
  {
    $team = $this->getDoctrine()
      ->getRepository('AppBundle:Team')
      ->findOneBy(['name' => $request->get('teamname')]);

    $data = [];
    if ($team) {
      $name = $request->query->get('name');
      $strip = $request->query->get('strip');
      $leaguename = $request->query->get('league');

      $league = $this->getDoctrine()
        ->getRepository('AppBundle:League')
        ->findOneBy(['name' => $leaguename]);

      $em = $this->getDoctrine()->getManager();

      if (!empty($name) && $name != $team->getName()) {
        $team->setName($name);
      }

      if (!empty($strip) && $strip != $team->getStrip()) {
        $team->setStrip($strip);
      }

      $team->setLeague($league);

      $em->persist($team);
      $em->flush();

      $data = [
        "name" => $team->getName(),
        "strip" => $team->getStrip(),
        "league" => $team->getLeague()->getName(),
      ];
    }

    return new Response(json_encode($data));
  }

}