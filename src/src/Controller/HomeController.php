<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/all', name: 'app_all_home')]
    public function all(TaskRepository $taskRepository): Response
    {
        // $tasksCurrentWeek = $taskRepository->findBy([
        //     'currentWeek' => true,
        //     'archived' => false,
        // ]);
        // $tasksNextWeek = $taskRepository->findBy([
        //     'nextWeek' => true,
        //     'archived' => false,
        // ]);
        return $this->render('home/index_all.html.twig', [
            // 'tasksCurrent' => $tasksCurrentWeek,
            // 'tasksNext' => $tasksNextWeek,
        ]);
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        if ($this->getUser() && $this->isGranted('ROLE_VERIFIED')) {
            return $this->redirectToRoute('app_all_home');
        }
        return $this->render('home/index.html.twig', []);
    }
}
