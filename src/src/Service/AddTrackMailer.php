<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Track;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class AddTrackMailer
{
  private MailerInterface $mailer;

  public function __construct(MailerInterface $mailer)
  {
    $this->mailer = $mailer;
  }

  public function send(Track $track): void
  {
    //$message = new Email();
    //$message
    //  ->subject('New track added')
    //  ->from('no-reply@test.cz')
    //  ->to('admin@test.cz')
    //  ->text('New track added: ' . $track->getTitle());

    $message = new TemplatedEmail();
    $message
      ->subject('New track added')
      ->from('no-reply@test.cz')
      ->to('admin@test.cz')
      ->htmlTemplate('email/track_added.html.twig')
      ->context([
        'track' => $track,
      ]);

    $this->mailer->send($message);
  }
}
