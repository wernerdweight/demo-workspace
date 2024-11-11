<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PalacinkyController extends AbstractController
{
    #[Route('/Recepty/Palacinky', name: 'app_palacinky')]
    public function index(): Response
    {
        return $this->render('Palacinky/index.html.twig', [
            'controller_name' => 'Palacinky',
        ]);
    }
}
