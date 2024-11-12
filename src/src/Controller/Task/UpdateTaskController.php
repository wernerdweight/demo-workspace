<?php

namespace App\Controller\Task;

use App\Form\TaskType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdateTaskController extends AbstractController
{
    #[Route('/task/update', name: 'app_task_update')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(TaskType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Task $task */
            $task = $form->getData();
            $task->setUpdatedDate(new \DateTime());
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        } 
        return $this->render('task/update.html.twig', [
            'form' => $form
        ]);
    }
}
