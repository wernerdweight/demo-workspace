<?php

declare(strict_types=1);

namespace App;

class MenuItem {
  public string $name;
  public string $link;
  private bool $shouldDisplay;

  private static int $count = 0;

  public function __construct(string $name, string $link, bool $shouldDisplay = true) {
    $this->name = $name;
    $this->link = $link;
    $this->shouldDisplay = $shouldDisplay;
    self::$count++;
  }

  public function __destruct() {
    self::$count--;
  }

  public static function getCount(): int {
    return self::$count;
  }

  public function shouldDisplay(): bool {
    return $this->shouldDisplay;
  }

  public function isActive(): bool {
    return $_SERVER['REQUEST_URI'] === $this->link;
  }
}
