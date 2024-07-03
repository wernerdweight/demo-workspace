<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OPController extends AbstractController
{
    #[Route('/o/p', name: 'app_o_p')]
    public function index(): Response
    {
        return $this->render('op/index.html.twig', [
            'controller_name' => 'OPController',
        ]);
    }
}
