<?php

namespace App\Controller;

use App\Entity\Track;
use App\Form\TrackType;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TrackController extends AbstractController
{
  #[Route('/track/add', name: 'app_track_add')]
  public function add(Request $request, EntityManagerInterface $entityManager, ArtistRepository $artistRepository): Response
  {
    $track = new Track();
    if ($request->query->has('artist_id')) {
      $artistId = $request->query->getInt('artist_id');
      $artist = $artistRepository->find($artistId);
      if (null !== $artist) {
        $track->setArtist($artist);
      }
    }
    $form = $this->createForm(TrackType::class, $track);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->persist($track);
      $entityManager->flush();
      return $this->redirectToRoute('app_artist', ['id' => $track->getArtist()->getId()]);
    }
    return $this->render('track/add.html.twig', [
      'trackForm' => $form,
    ]);
  }
}
