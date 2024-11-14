<?php

declare(strict_types=1);

namespace App\Service\Mailer;

use App\Entity\Team;
use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class TeamMailer
{
  public function __construct(private MailerInterface $mailer)
  {
  }

  public function sendUpdatedEmail(Team $team, User $user): void
  {
    $email = new TemplatedEmail();
    $email->from($user->getEmail());
    $email->to('admin@mujweb.cz');
    $email->subject('Team updated');
    $email->htmlTemplate('email/team_updated.html.twig');
    $email->context([
      'team' => $team,
    ]);

    $this->mailer->send($email);
  }
}
