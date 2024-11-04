<?php

declare(strict_types=1);

namespace App\Football;

class Team
{
  public function __construct(
    public readonly string $name,
    public readonly string $city,
    public readonly string $managerName,
    /** @var Player[] $players */
    public readonly array $players,
    public int $points = 0,
    public int $goalsScored = 0,
    public int $goalsConceded = 0,
  ) {
  }

  public function getAveragePlayerAge(): float
  {
    $age = 0;
    foreach ($this->players as $player) {
      $age += $player->age;
    }
    // $age = $age / count($team->players); // same as the below
    $age /= count($this->players);
    return $age;
  }
}
