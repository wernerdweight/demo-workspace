<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
  #[Route('/', name: 'app_home')]
  public function index(TeamRepository $teamRepository): Response
  {
    $teams = $teamRepository->findAll();

    return $this->render('home/index.html.twig', [
      'teams' => $teams,
    ]);
  }
}
