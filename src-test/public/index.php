<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\MenuItem;
use App\Request\TestRequest;

$user = 'Franta';
//$user = null;
$isAuthorized = $user !== null; // value is false

echo MenuItem::getCount() . PHP_EOL;  // 0

$menuItems = [
  new MenuItem("Home", "/"),
  new MenuItem("About me", "/about.html"),
  new MenuItem("Secret chamber", "/secret.html", $isAuthorized),
  new MenuItem("Logout", "/logout", $isAuthorized),
  new MenuItem("Login", "/login", !$isAuthorized),
];

echo MenuItem::getCount() . PHP_EOL; // 5

$menuItems[] = new MenuItem("Contact", "/contact.html");

echo MenuItem::getCount() . PHP_EOL; // 6

unset($menuItems[5]);

echo MenuItem::getCount() . PHP_EOL; // 5



$test = new MenuItem("Test", "/test.html", false);

echo MenuItem::getCount() . PHP_EOL; // 6
echo count($menuItems) . PHP_EOL; // 5

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
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><?=$user ?: 'anonymous' ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <?php
          foreach ($menuItems as $menuItem) {
            if (!$menuItem->shouldDisplay()) { // equivalent of $menuItem->shouldDisplay === false
              continue;
            }
          ?>
            <li class="nav-item">
              <a
                class="nav-link <?= $menuItem->isActive() ? 'active' : '' ?>"
                href="<?php echo $menuItem->link; ?>"
              >
                <?php echo $menuItem->name; ?>
              </a>
            </li>
          <?php
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>
  <form method="post" action="/" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="whatever">
    </div>
    <div class="mb-3">
      <label for="audio" class="form-label">Audio file</label>
      <input type="file" class="form-control" id="audio" name="audio">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <pre>
    <?php
    $request = new TestRequest();
    $request->logGetParams();
    $request->logPostParams();
    $request->logFiles();
    $request->logServerParams();

    echo $_POST['whatever'];
    ?>
  </pre>
</div>
</body>
</html>
