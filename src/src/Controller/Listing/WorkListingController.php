<?php

namespace App\Controller\Listing;

use App\Enum\ListingType;
use App\Enum\ScopeType;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WorkListingController extends AbstractController
{
    #[Route('/listing/work', name: 'app_listing_work')]
    public function index(TaskRepository $taskRepository): Response
    {   
        $tasksCurrent = $taskRepository->findBy([
            'scope' => ScopeType::CURRENT,
            'listing' => ListingType::WORK,
        ]);
        $tasksNext = $taskRepository->findBy([
            'scope' => ScopeType::NEXT,
            'listing' => ListingType::WORK,
        ]);
        return $this->render('listing/work.html.twig', [
            'tasksCurrent' => $tasksCurrent,
            'tasksNext' => $tasksNext,
        ]);
    }
}
