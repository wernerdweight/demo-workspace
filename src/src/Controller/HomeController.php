<?php

namespace App\Controller;

use App\Repository\PortfolioItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PortfolioItemRepository $portfolioItemRepository): Response
    {
    $portfolioItems = $portfolioItemRepository->findAll();
        return $this->render('home/index.html.twig', 
        [
            'portfolioItems'=> $portfolioItems,
        ]);
    }
}
