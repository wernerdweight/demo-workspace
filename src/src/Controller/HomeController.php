<?php

namespace App\Controller;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AlbumRepository $albumRepository): Response
    {
        $menuItems = ['Main', 'Blog', 'Media', 'Contact', 'Other'];
        $albums = $albumRepository -> findAll();
        return $this->render('home/index.html.twig', [
            'menuItems' => $menuItems,
            'albums' => $albums
        ]);
    }

}