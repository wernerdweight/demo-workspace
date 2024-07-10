<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class BeatsController extends AbstractController

{
    #[Route('/beats', name: 'app_beats')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('beats/index.html.twig', [
            'controller_name' => 'BeatsController',
        ]);
    }
}
