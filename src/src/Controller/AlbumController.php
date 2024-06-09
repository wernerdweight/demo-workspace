<?php

namespace App\Controller;

use App\Entity\Album;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AlbumController extends AbstractController
{
    #[Route('/album/{id}', name: 'app_album')]
    public function index(Album $album): Response
    {
        return $this->render('album/index.html.twig', [
            'album' => $album,
        ]);
    }
}
