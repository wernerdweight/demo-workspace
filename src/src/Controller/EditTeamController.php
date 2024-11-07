<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditTeamController extends AbstractController
{
  #[Route('/edit/team/{teamName}', name: 'app_team_edit')]
  public function index(
    #[MapEntity(mapping: ['teamName' => 'canonical'])]
    Team $team,
    Request $request,
    EntityManagerInterface $entityManager
  ): Response {
    $form = $this->createForm(TeamType::class, $team);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->flush();

      return $this->redirectToRoute('app_team', ['teamName' => $team->getCanonical()]);
    }
    return $this->render('team/edit.html.twig', [
      'team' => $team,
      'form' => $form,
    ]);
  }
}
