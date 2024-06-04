<?php

namespace App\Controller;

use App\Entity\Artist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
  #[Route('/artist/{id}', name: 'app_artist')]
  public function index(Artist $artist): Response
  {
    return $this->render('artist/index.html.twig', [
      'artist' => $artist,
    ]);
  }
}
