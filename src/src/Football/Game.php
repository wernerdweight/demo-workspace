<?php

declare(strict_types=1);

namespace App\Football;

class Game
{
  public function __construct(
    public readonly Team $homeTeam,
    public readonly Team $awayTeam,
    public readonly int $homeTeamGoals,
    public readonly int $awayTeamGoals,
  ) {
  }

  public function getWinner(): ?Team
  {
    if ($this->homeTeamGoals > $this->awayTeamGoals) {
      return $this->homeTeam;
    }
    if ($this->homeTeamGoals < $this->awayTeamGoals) {
      return $this->awayTeam;
    }
    return null;
  }
}
