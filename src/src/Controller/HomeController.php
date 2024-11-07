<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TaskRepository $taskRepository): Response
    {
        $tasksCurrentWeek = $taskRepository->findBy([
            'currentWeek' => true,
            'archived' => false,
        ]);
        $tasksNextWeek = $taskRepository->findBy([
            'nextWeek' => true,
            'archived' => false,
        ]);
        return $this->render('home/index.html.twig', [
            'tasksCurrent' => $tasksCurrentWeek,
            'tasksNext' => $tasksNextWeek,
        ]);
    }
}
