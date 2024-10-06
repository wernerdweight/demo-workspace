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

<?php

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

require dirname(__DIR__).'/vendor/autoload.php';

// send an email to test the mailhog container SMTP server
echo 'sending test email...' . PHP_EOL;

$transport = Transport::fromDsn('smtp://mailhog:1025');
$mailer = new Mailer($transport);

$email = (new Email())
    ->from('hello@example.com')
    ->to('you@example.com')
    ->subject('Test Message!')
    ->text('Not a real message. Just testing the mailhog container.');

$mailer->send($email);

echo 'sent' . PHP_EOL;

?>
      </div>
    </pre>
    </div>
  </div>
</body>
</html>
