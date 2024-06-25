<?php

namespace App\Controller;


use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Project;

class HomeController extends AbstractController
{
  #[Route('/', name: 'app_home')]
  public function index(ProjectRepository $projectRepository): Response
  {
   $projects = $projectRepository->findAll();
   

    
    return $this->render('home/index.html.twig', [
    'projects' => $projects,
    ]);
  }
}
