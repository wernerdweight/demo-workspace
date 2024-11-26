<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ReceptyRepository;

class ReceptyController extends AbstractController
{
    #[Route('/Recepty', name: 'app_recepty')]
    public function index(ReceptyRepository $repository): Response
    {
        $recepty = $repository->findAll();

        return $this->render('Recepty/index.html.twig', [
            "recepty" => $recepty,
        ]);
    }
}