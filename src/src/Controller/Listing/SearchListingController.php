<?php

namespace App\Controller\Listing;

use App\Enum\ListingType;
use App\Enum\ScopeType;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchListingController extends AbstractController
{
    private const DEFAULT_PAGE = 1;
    private const DEFAULT_LIMIT = 10;
    #[Route('/search', name: 'app_search')]
    public function index(TaskRepository $taskRepository, Request $request): Response
    {   
        $page = $request->query->getInt('page', self::DEFAULT_PAGE);
        $limit = $request->query->getInt('limit', self::DEFAULT_LIMIT);
        $searchTerm = $request->query->get('searchTerm');
        $tasks = $taskRepository->findWithPagination($page, $limit, $searchTerm);
        $totalTasks = $taskRepository->countWithSearchTerm($searchTerm);
        return $this->render('listing/search.html.twig', [
            'tasks' => $tasks,
            'page' => $page,
            'limit' => $limit,
            'searchTerm' => $searchTerm,
            'totalTasks' => $totalTasks,
        ]);
    }
}
