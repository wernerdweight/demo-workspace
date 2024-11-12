<?php

namespace App\Controller;

use App\Entity\LocationText;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/privacy', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('privacy.html.twig');
    }

    #[Route('/terms', name: 'terms')]
    public function terms(): Response
    {
        return $this->render('terms.html.twig');
    }

    #[Route('/game/{latitude}/{longitude}', name: 'game')]
    public function game(float $latitude, float $longitude, EntityManagerInterface $em): Response //tady to musíš opravit
    {
        // Vyhledáme text pro konkrétní souřadnice
        $locationText = $em->getRepository(LocationText::class)->findOneBy([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        // Pokud text pro dané souřadnice není nalezen, použijeme výchozí text
        $text = $locationText ? $locationText->getText() : 'Text pro tuto lokaci nebyl nalezen.';

        // Předáme souřadnice a text do šablony
        return $this->render('game.html.twig', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'text' => $text,
        ]);
    }
}
