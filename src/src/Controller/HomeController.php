<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
  #[Route('/', name: 'app_home')]
  public function index(ArtistRepository $artistRepository): Response
  {
    $artists = $artistRepository->findAll();

    return $this->render('home/index.html.twig', [
      'artists' => $artists,
    ]);
  }
}
