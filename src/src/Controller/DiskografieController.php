<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Doctrine\ORM\EntityManagerInterface;

class DiskografieController extends AbstractController
{
    #[Route('/diskografie', name: 'app_diskografie')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {       
        return $this->render('diskografie/index.html.twig', [

        ]);
        
    }

}