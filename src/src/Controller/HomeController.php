<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
  private const DEFAULT_PAGE = 1;

  private const DEFAULT_LIMIT = 10;


  #[Route('/', name: 'app_home')]
  public function index(TeamRepository $teamRepository, Request $request): Response
  {
    $page = $request->query->getInt('page', self::DEFAULT_PAGE);
    $limit = $request->query->getInt('limit', self::DEFAULT_LIMIT);
    $searchTerm = $request->query->get('searchTerm');

    $teams = $teamRepository->findWithPagination($page, $limit, $searchTerm);
    $totalTeams = $teamRepository->countWithSearchTerm($searchTerm);

    return $this->render('home/index.html.twig', [
      'teams' => $teams,
      'page' => $page,
      'limit' => $limit,
      'searchTerm' => $searchTerm,
      'totalTeams' => $totalTeams,
    ]);
  }
}
