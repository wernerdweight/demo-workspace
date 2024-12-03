<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ReceptyRepository;
use App\Entity\Recepty;

class FotogalerieController extends AbstractController
{
    #[Route('/fotogalerie', name: 'app_fotogalerie')]
    public function index(ReceptyRepository $repository): Response
    {
        $foto = $repository->findAll();

        return $this->render('fotogalerie/index.html.twig', [
            'foto' =>  $foto,
        ]);
    }
}
