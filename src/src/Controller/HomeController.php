<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Service\QuestionMailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\QuestionType;
use App\Entity\Question;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager, QuestionMailer $questionMailer): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($question);
            $entityManager->flush();
            $questionMailer->sendQuestion($question);

            return $this->redirectToRoute('app_home');
        }


        return $this->render('home/index.html.twig', [
            'form' => $form,
        ]);
    }
}
