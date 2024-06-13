<?php

namespace App\Controller;

use App\Entity\Question;
use App\Service\QuestionFormProvider;
use App\Service\QuestionMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AddQuestionController extends AbstractController
{
  #[Route('/question/add', name: 'app_add_question')]
  public function add(
    Request $request,
    QuestionFormProvider $questionFormProvider,
    EntityManagerInterface $entityManager,
    QuestionMailer $questionMailer,
  ): Response {
    $question = new Question();
    $form = $questionFormProvider->getForm($question);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->persist($question);
      $entityManager->flush();
      $questionMailer->sendQuestion($question);

      return $this->json(['message' => 'Question has been added!']);
    }
    return $this->json(['message' => $form->getErrors(true)], Response::HTTP_BAD_REQUEST);

    //$referer = $request->headers->get('referer');
    //return $this->redirect($referer);
  }
}
