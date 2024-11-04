<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{
  #[Route('/team/{teamName}', name: 'app_team')]
  public function index(string $teamName): Response
  {
    $teams = [
      [
        'name' => 'FC Barcelona',
        'established' => new \DateTime('1899-11-29'),
        'players' => [
          [
            'firstName' => 'Lionel',
            'lastName' => 'Messi',
            'age' => 34,
            'positions' => ['RW', 'CF'],
            'number' => 10,
            'preferredFoot' => 'left',
          ],
          [
            'firstName' => 'Sergio',
            'lastName' => 'Busquets',
            'age' => 33,
            'positions' => ['CDM'],
            'number' => 5,
            'preferredFoot' => 'right',
          ],
          [
            'firstName' => 'Gerard',
            'lastName' => 'Piqué',
            'age' => 34,
            'positions' => ['CB'],
            'number' => 3,
            'preferredFoot' => 'right',
          ]
        ],
      ],
      [
        'name' => 'Real Madrid',
        'established' => new \DateTime('1902-03-06'),
        'players' => [
          [
            'firstName' => 'Karim',
            'lastName' => 'Benzema',
            'age' => 33,
            'positions' => ['CF'],
            'number' => 9,
            'preferredFoot' => 'right',
          ],
          [
            'firstName' => 'Luka',
            'lastName' => 'Modrić',
            'age' => 36,
            'positions' => ['CM'],
            'number' => 10,
            'preferredFoot' => 'right',
          ],
        ],
      ],
      [
        'name' => 'Manchester City',
        'established' => new \DateTime('1880-04-23'),
        'players' => [
          [
            'firstName' => 'Kevin',
            'lastName' => 'De Bruyne',
            'age' => 30,
            'positions' => ['CAM', 'CM'],
            'number' => 17,
            'preferredFoot' => 'right',
          ],
          [
            'firstName' => 'Phil',
            'lastName' => 'Foden',
            'age' => 21,
            'positions' => ['LW', 'RW'],
            'number' => 47,
            'preferredFoot' => 'left',
          ],
        ],
      ],
    ];

    $team = null;
    foreach ($teams as $t) {
      if ($t['name'] === $teamName) {
        $team = $t;
        break;
      }
    }

    return $this->render('team/index.html.twig', [
      'team_name' => $teamName,
      'team' => $team,
      'teams' => $teams,
    ]);
  }
}
