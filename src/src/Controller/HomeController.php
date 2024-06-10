<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
    $portfolioItems = ['Packing Box', 'Bannery', 'Oblečení', 'Billboardy', 'Vizitky', 'Loga', 'Printy', 'Patterny', 'Fotky', 'Katalogy', 'Hra', 'Weby'];
        return $this->render('home/index.html.twig', 
        [
            'portfolioItems'=> $portfolioItems,
        ]);
    }
}
