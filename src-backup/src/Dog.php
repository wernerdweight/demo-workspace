<?php

declare(strict_types=1);

namespace App;

class Dog extends Animal
{
  private string $breed;

  public function __construct(int $age, string $name, string $breed)
  {
    parent::__construct($age, $name);
    $this->breed = $breed;
    echo "A dog named $this->name has been created.\n";
  }

  public function makeSound(): void
  {
    echo "$this->breed $this->name barks.\n";
  }
}
