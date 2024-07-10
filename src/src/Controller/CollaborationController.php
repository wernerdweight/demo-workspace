<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CollaborationController extends AbstractController
{
    #[Route('/collaboration', name: 'app_collaboration')]
    public function index(): Response
    {
        return $this->render('collaboration/index.html.twig', [
            'controller_name' => 'CollaborationController',
        ]);
    }
}
