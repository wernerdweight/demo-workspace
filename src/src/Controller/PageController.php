<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('login.html.twig');
    }

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
    public function game(int $latitude, int $longitude): Response
    {
        return $this->render('game.html.twig', [
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }
    #[Route('/register', name: 'register')]
    public function register(): Response
    {
        return $this->render('register.html.twig');
    }
}
