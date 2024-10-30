<?php

declare(strict_types=1);

namespace App;

class Animal
{
  private int $age;
  public string $name;
  private static int $count = 0;

  public function __construct(int $age, string $name)
  {
    $this->name = $name;
    $this->age = $age;
    self::$count++;
    echo "An animal named $this->name has been created.\n";
  }

  public function makeSound(): void
  {
    echo "$this->name makes a sound.\n";
  }

  public static function getCount(): int
  {
    return self::$count;
  }

  public function __destruct()
  {
    echo "An animal named $this->name is being destroyed.\n";
    self::$count--;
  }
}
