<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Product;


const MARGIN = 0.9;

$products = [
  [
    'name' => 'MyWash LSGD634',
    'price' => 1.23,
    'quantity' => 10,
  ],
  [
    'name' => 'MyWash S63',
    'price' => 10.23,
    'quantity' => 10,
  ],
  [
    'name' => 'MyWash SHDG',
    'price' => 100.23,
    'quantity' => 100,
  ]
];

function sumStorageValue(array $products, float $margin): float
{
  $sum = 0;
  foreach ($products as $product) {
    $sum += $product['price'] * (1 - $margin) * $product['quantity'];
  }
  return $sum;
}

function printStorageValue(float $value): void
{
  if ($value < 1000) {
    echo 'we\'re broke!' . PHP_EOL;
  } else if ($value < 10000) {
    echo 'we\'re doing ok: ' . $value . ' Kč' . PHP_EOL;
  } else {
    echo 'we\'re rich!' . PHP_EOL;
  }
}

function printStorageValueTernary(float $value): void
{
  $productDescription = null;//'Great product';
  echo $productDescription ?: 'no description' . PHP_EOL;

  echo $value < 1000
    ? 'we\'re broke!' . PHP_EOL
    : 'we\'re doing ok' . PHP_EOL;
}

//printStorageValue(sumStorageValue($products, MARGIN));
//printStorageValueTernary(sumStorageValue($products, MARGIN));

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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><?= $product['name']; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link" href="#test">
                Test
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#test2">
                Test 2
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#test3">
                Test 3
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <form method="post" action="/" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="whatever" value="<?= $product['price'] ?>">
      </div>
      <div class="mb-3">
        <label for="audio" class="form-label">Quantity</label>
        <input type="file" class="form-control" id="audio" name="audio">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <pre>
  </pre>
    <div>
      <textarea cols="120" rows="10"><?php
      /*$products = [
        new Product('MyWash LSGD634', -1.23, 10, false, false),
        new Product('MyWash S63', 10.23, 10, false, false),
        new Product('MyWash SHDG', 100.23, 100, false, false),
        new Product('MyWash SHDG', 100.23, 100, true, false),
      ];
      foreach ($products as $product) {
        //echo 'Product: ' . $product->name . PHP_EOL;
        //echo 'Suitable for children: ' . ($product->isSuitableForChildren() ? 'yes' : 'no') . PHP_EOL;
        $product->prettyPrint(true);
        echo PHP_EOL;
      }*/

      $animals = [
        new App\Animal(3, 'Micka'),
        new App\Dog(7, 'Buddy', 'Golden Retriever'),
      ];

      echo App\Animal::getCount();
      echo PHP_EOL;

      $animals[] = new App\Dog(2, 'Rex', 'German Shepherd');
      $animals[] = new App\Animal(5, 'Lassie');

      foreach ($animals as $animal) {
        $animal->makeSound();
      }

      echo App\Animal::getCount();

      unset($animals[1]);

      echo App\Animal::getCount();

      ?>
    </textarea>
    </div>
  </div>
</body>

</html>
