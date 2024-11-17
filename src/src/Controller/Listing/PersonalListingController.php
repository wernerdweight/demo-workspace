<?php

namespace App\Controller\Listing;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PersonalListingController extends AbstractController
{
    #[Route('/listing/personal/', name: 'app_listing_personal')]
    public function index(TaskRepository $taskRepository): Response
    {   
        $tasksCurrent = $taskRepository->findBy([
            'currentWeek' => true,
            'archived' => false,
        ]);
        $tasksNext = $taskRepository->findBy([
            'nextWeek' => true,
            'archived' => false,
        ]);
        return $this->render('listing/personal.html.twig', [
            'tasksCurrent' => $tasksCurrent,
            'tasksNext' => $tasksNext,
        ]);
    }
}
