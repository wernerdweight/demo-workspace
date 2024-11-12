<?php

namespace App\Controller\Task;

use App\Entity\Task;
use App\Form\TaskType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateTaskController extends AbstractController
{
    #[Route('/task/create', name: 'app_task_create')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {   
        $form = $this->createForm(TaskType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Task $task */
            $task = $form->getData();
            $task->setCreationDate(new \DateTime());
            $task->setUpdatedDate(new \DateTime());
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        } 
        return $this->render('task/create.html.twig', [
            'form' => $form
        ]);
    }
}
