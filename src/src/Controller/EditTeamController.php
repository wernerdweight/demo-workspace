<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use App\Service\Mailer\TeamMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class EditTeamController extends AbstractController
{
  #[Route('/team/{teamName}/edit', name: 'app_team_edit')]
  public function index(
    #[MapEntity(mapping: ['teamName' => 'canonical'])]
    Team $team,
    Request $request,
    EntityManagerInterface $entityManager,
    UserInterface $user,
    TeamMailer $teamMailer,
  ): Response {
    $form = $this->createForm(TeamType::class, $team);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->flush();

      $teamMailer->sendUpdatedEmail($team, $user);

      $this->addFlash('success', 'Team updated successfully!');
      return $this->redirectToRoute('app_team', ['teamName' => $team->getCanonical()]);
    }
    return $this->render('team/edit.html.twig', [
      'team' => $team,
      'form' => $form,
    ]);
  }
}
