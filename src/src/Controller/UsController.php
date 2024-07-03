<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UsController extends AbstractController
{
    #[Route('/unlimitedstory', name: 'app_us')]
    public function index(): Response
    {
        return $this->render('us/index.html.twig', [
            'controller_name' => 'UsController',
        ]);
    }
}
