<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppControllerTryController extends AbstractController
{
    #[Route('/app/controller/try', name: 'app_controller_try')]
    public function index(): Response
    {
        return $this->render('app_controller_try/index.html.twig', [
            'controller_name' => 'AppControllerTryController',
        ]);
    }
}
