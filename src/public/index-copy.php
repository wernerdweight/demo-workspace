<?php
$nadpis = "Hello World!";
$form = "<form method='post'>
<div class='mb-3'>
<label for='name' class='form-label'>Full Name</label>
<input type='text' class='form-control' id='name' name='name'>
</div>
</form>";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mailhog Test</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>Smoke Test</h1>
<p>Check the mailhog web interface at <a href="http://localhost:8025/" target="_blank">http://localhost:8025/</a> to see the email.</p>
<p>Check the adminer web interface at <a href="http://localhost:8080/" target="_blank">http://localhost:8080/</a> to access the database.</p>

<div class="text-bg-dark">
<pre>
<div class="container">
<h1><?=$nadpis?></h1>
<?=$form?>
<?php

const CREATED = 1;
const PAID = 2;
const SHIPPED = 3;
const DELIVERED = 4;
const CANCELLED = 5;

$order = [
  'id' => 1,
  'status' => CREATED
];

function changeOrderStatusToShipped(array $order): array {
  $order['status'] = SHIPPED;
  return $order;
}

function outputOrderStatus(array $order): void {
  echo 'Order ID: ' . $order['id'] . '<br>';
  echo 'Status: ' . $order['status'] . '<br>';
}

outputOrderStatus($order) . '<br>';
echo 'Before: ' . $order['status'] . '<br>';
//$order = changeOrderStatusToShipped($order);
$order = changeOrderStatusToShipped($order);
echo 'After: ' . $order['status']. '<br><br>';




//if ($order['status'] === SHIPPED) {
//  echo 'The order has been shipped.';
//} else {
//  echo 'The order has not been shipped.';
//}


echo 'The order has' . $order['status'] === SHIPPED ? '' : ' not' . ' been shipped.<br>';

if (true) {
  echo 1;
} else {
  echo 2;
}

true ? 1 : 2;

echo '<br><br>';

for ($i = 0; $i < 5; $i++) {
  echo $i . '<br>';
}

$a = 0;
while ($a < 5) {
  echo $a . '<br>';
  $a++;
}

$array = [1, 'key' => 2, 3, 4, 5];
foreach ($array as $key => $value) {
  echo $key . ': ' . $value . '<br>';
}


echo '<br><br>';




$integer = 1;
$float = 1.1;
$string = 'Hello World!';
$boolean = false;
echo $array[0];
echo '<br>';
echo $array[2];
echo '<br>';

$product = [
  'name' => 'iPhone',
  'price' => 1234,
  'variants' => [
    ["name" => "iPhone 12", "price" => 1234],
    ["name" => "iPhone 13", "price" => 1234]
  ]
];
  echo '<br>';
  echo $product['variants'][1]['name'];
  echo '<br>';

  $object = new stdClass();
  $product2 = null;

  echo "<textarea>test\ntest2</textarea>";
  echo '<textarea>test\ntest2</textarea>';

  echo gettype($integer);
  echo '<br>';
  echo gettype($float);
  echo '<br>';
  echo gettype($string);
  echo '<br>';
  echo gettype($boolean);


  ?>
  </div>
  </pre>
  </div>
  </div>
  </body>
  </html>
