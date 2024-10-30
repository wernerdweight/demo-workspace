<?php

declare(strict_types=1);

use App\Football\Game;
use App\Football\Player;
use App\Football\Team;

require_once dirname(__DIR__) . '/vendor/autoload.php';


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mailhog Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <?php

    const WIN = 'win';
    const DRAW = 'draw';
    const LOSS = 'loss';
    const POINTS = [
      WIN => 3,
      DRAW => 1,
      LOSS => 0,
    ];


    $teams = [
      new Team(
        'AC Sparta Praha',
        'Praha',
        'Lars Friis',
        [
          new Player('Adam', 'Hložek', 23, ['ST', 'LW'], 15, 'right', ),
          new Player('Lukáš', 'Jedlička', 22, ['CM', 'CDM'], 6, 'right', ),
          new Player('David', 'Moberg Karlsson', 24, ['RW', 'LW'], 7, 'right', ),
        ],
      ),
      new Team(
        'SK Slavia Praha',
        'Praha',
        'Jindřich Trpišovský',
        [
          new Player('Ondřej', 'Kúdela', 33, ['CB', 'RB'], 3, 'right', ),
          new Player('Tomáš', 'Holeš', 28, ['CB', 'RB'], 5, 'right', ),
          new Player('Abdallah', 'Simba', 25, ['ST', 'LW'], 9, 'right', ),
        ],
      ),
      new Team(
        'FC Viktoria Plzeň',
        'Plzeň',
        'Adrian Guľa',
        [
          new Player('Lukáš', 'Kalvach', 26, ['CM', 'CDM'], 8, 'right', ),
          new Player('Tomáš', 'Chorý', 27, ['ST', 'LW'], 10, 'right', ),
          new Player('Jan', 'Kopic', 29, ['RW', 'LW'], 11, 'right', ),
        ],
      ),
      new Team(
        'FC Baník Ostrava',
        'Ostrava',
        'Lubomír Vlk',
        [
          new Player('Tomáš', 'Zajíc', 30, ['CM', 'CDM'], 8, 'right', ),
          new Player('Tomáš', 'Smola', 31, ['ST', 'LW'], 10, 'right', ),
          new Player('Tomáš', 'Petržela', 32, ['RW', 'LW'], 11, 'right', ),
        ],
      ),
      new Team(
        'FC Fastav Zlín',
        'Zlín',
        'Ladislav Minář',
        [
          new Player('Tomáš', 'Wágner', 33, ['CM', 'CDM'], 8, 'right', ),
          new Player('Tomáš', 'Petrášek', 34, ['ST', 'LW'], 10, 'right', ),
          new Player('Tomáš', 'Konečný', 35, ['RW', 'LW'], 11, 'right', ),
        ],
      ),
      new Team(
        'FC Slovan Liberec',
        'Liberec',
        'Ladislav Maier',
        [
          new Player('Tomáš', 'Kacharaba', 36, ['CM', 'CDM'], 8, 'right', ),
          new Player('Tomáš', 'Malinský', 37, ['ST', 'LW'], 10, 'right', ),
          new Player('Tomáš', 'Potočný', 38, ['RW', 'LW'], 11, 'right', ),
        ],
      ),
    ];

    $games = [
      new Game($teams[0], $teams[1], 2, 1),
      new Game($teams[2], $teams[3], 3, 3),
      new Game($teams[4], $teams[5], 1, 2),
    ];

    foreach ($teams as $team) {
      //echo 'Average player age in ' . $team->name . ' is ' . $team->getAveragePlayerAge() . PHP_EOL;
    }

    foreach ($games as $game) {
      $game->homeTeam->goalsScored += $game->homeTeamGoals;
      $game->homeTeam->goalsConceded += $game->awayTeamGoals;
      $game->awayTeam->goalsScored += $game->awayTeamGoals;
      $game->awayTeam->goalsConceded += $game->homeTeamGoals;

      $winner = $game->getWinner();
      if ($winner === null) {
        $game->homeTeam->points += POINTS[DRAW];
        $game->awayTeam->points += POINTS[DRAW];
      } else {
        $winner->points += POINTS[WIN];
      }
    }

    usort($teams, fn($a, $b) => $b->points - $a->points);

    ?>
    <table class="table">
      <tr>
        <th>#</th>
        <th>Team</th>
        <th>Pts.</th>
        <th>GS</th>
        <th>GC</th>
      </tr>
      <?php
      foreach ($teams as $index => $team) {
        ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><a href="/team/<?= $team->name ?>"><?= $team->name ?></a></td>
          <td><?= $team->points ?></td>
          <td><?= $team->goalsScored ?></td>
          <td><?= $team->goalsConceded ?></td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
</body>

</html>
