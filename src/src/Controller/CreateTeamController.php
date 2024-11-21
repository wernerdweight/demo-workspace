<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use App\Service\Uploader\LogoUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateTeamController extends AbstractController
{
  #[Route('/team/create', name: 'app_team_create')]
  public function index(
    EntityManagerInterface $entityManager,
    Request $request,
    LogoUploader $logoUploader,
  ): Response {
    $form = $this->createForm(TeamType::class);
    $team = new Team();
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $team = $form->getData();

      /** @var UploadedFile|null $logo */
      $logo = $request->files->get('team')['logoPath'];
      if (null !== $logo) {
        $logoName = $logoUploader->upload($logo);
        $team->setLogoPath($logoName);
      }

      $entityManager->persist($team);
      $entityManager->flush();

      return $this->redirectToRoute('app_home');
    }

    return $this->render('team/create.html.twig', [
      'form' => $form,
    ]);
  }
}
