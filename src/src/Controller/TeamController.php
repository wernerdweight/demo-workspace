<?php

namespace App\Controller;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class TeamController extends AbstractController
{
  #[Route('/team/{teamName}', name: 'app_team')]
  public function index(
    #[MapEntity(mapping: ['teamName' => 'canonical'])]
    Team $team,
    TeamRepository $teamRepository
  ): Response {
    $teams = $teamRepository->findAll();

    return $this->render('team/index.html.twig', [
      'team_name' => $team->getName(),
      'team' => $team,
      'teams' => $teams,
    ]);
  }
}
