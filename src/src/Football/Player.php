<?php

declare(strict_types=1);

namespace App\Football;

class Player
{
  public function __construct(
    public readonly string $name,
    public readonly string $surname,
    public readonly int $age,
    /** @var string[] $positions */
    public readonly array $positions,
    public readonly int $number,
    public readonly string $primaryLeg,
  ) {
  }
}
