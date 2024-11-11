<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReceptyController extends AbstractController
{
    #[Route('/Recepty', name: 'app_recepty')]
    public function index(): Response
    {
        return $this->render('Recepty/index.html.twig', [
            'controller_name' => 'ReceptyController',
        ]);
    }
}