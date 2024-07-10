<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DrumkitsController extends AbstractController
{
    #[Route('/drumkits', name: 'app_drumkits')]
    public function index(): Response
    {
        return $this->render('drumkits/index.html.twig', [
            'controller_name' => 'DrumkitsController',
        ]);
    }
}
