<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Question;
use App\Form\QuestionType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class QuestionFormProvider
{
  private FormFactoryInterface $formFactory;

  public function __construct(FormFactoryInterface $formFactory)
  {
    $this->formFactory = $formFactory;
  }

  public function getForm(?Question $question = null): FormInterface
  {
    $form = $this->formFactory->create(QuestionType::class, $question);
    return $form;
  }
}
