<?php

declare(strict_types=1);

namespace App;

class Product
{
  public function __construct(
    public readonly string $name,
    private readonly float $price,
    public readonly int $quantity,
    private readonly bool $containsAlcohol,
    private readonly bool $adultMaterial,
  ) {
    echo 'Product created: ' . $name . PHP_EOL;
  }

  public function isSuitableForChildren(): bool
  {
    return $this->containsAlcohol === false && $this->adultMaterial === false;
  }

  public function prettyPrint(bool $detailed = false): void
  {
    echo 'Product: ' . $this->name . PHP_EOL;
    echo 'Price: ' . $this->getPrice() . PHP_EOL;
    if ($detailed) {
      echo 'Quantity: ' . $this->quantity . PHP_EOL;
      echo 'Contains alcohol: ' . ($this->containsAlcohol ? 'yes' : 'no') . PHP_EOL;
      echo 'Contains adult material: ' . ($this->adultMaterial ? 'yes' : 'no') . PHP_EOL;
    }
  }

  public function getPrice(): float
  {
    if ($this->price < 0) {
      throw new \Exception('Price cannot be negative');
    }
    return $this->price;
  }

  public function __destruct()
  {
    echo 'Product destroyed: ' . $this->name . PHP_EOL;
  }
}
