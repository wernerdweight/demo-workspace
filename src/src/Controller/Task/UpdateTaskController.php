<?php

namespace App\Controller\Task;

use App\Entity\Task;
use App\Form\TaskType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdateTaskController extends AbstractController
{
    #[Route('/task/update/{taskId}', name: 'app_task_update')]
    public function index(
        #[MapEntity(mapping: ['taskId' => 'id'])]
        Task $task,
        EntityManagerInterface $entityManager, 
        Request $request, 
        ): Response
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task->setUpdatedDate(new \DateTime());
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('task/update.html.twig', [
            'form' => $form
        ]);
    }
}
