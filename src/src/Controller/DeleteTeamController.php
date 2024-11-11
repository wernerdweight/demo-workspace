<?php

namespace App\Controller;

use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeleteTeamController extends AbstractController
{
  #[Route('/team/{teamName}/delete', name: 'app_team_delete')]
  public function index(
    #[MapEntity(mapping: ['teamName' => 'canonical'])]
    Team $team,
    EntityManagerInterface $entityManager
  ): Response {
    $entityManager->remove($team);
    $entityManager->flush();
    return $this->redirectToRoute('app_home');
  }
}
