<?php

namespace App\Controller;

use App\Entity\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/game', name: 'game', methods: ['GET', 'POST'])]
    public function game(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $position = $request->request->get('position', '0');
        } else {
            $position = '0';
        }

        // Načíst text a možnosti na základě pozice
        $location = $em->getRepository(Location::class)->findOneBy([
            'position' => $position,
        ]);

        $text = $location ? $location->getLocationText() : 'Text pro tuto lokaci nebyl nalezen.';
        $options = $location ? $location->getOptions() : [];

        return $this->render('game.html.twig', [
            'position' => $position,
            'text' => $text,
            'options' => $options,
        ]);
    }
}
