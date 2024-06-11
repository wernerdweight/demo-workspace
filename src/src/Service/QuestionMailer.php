<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Question;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;



class QuestionMailer
{
    private MailerInterface $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    
    public function sendQuestion(Question $question): void{
        $message = new TemplatedEmail();
        $message->from($question->getEmail());
        $message->to('admin@localhost');
        $message->subject('New question');
        $message->htmlTemplate('emails/question.html.twig');
        $message->context([
            'question' => $question,
        ]);

        $this->mailer->send($message);

    }
}
