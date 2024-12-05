<?php

namespace App\Controller\Task;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class DeleteTaskController extends AbstractController
{
    #[Route('/task/delete/{taskId}', name: 'app_task_delete')]
    public function index(
        #[MapEntity(mapping: ['taskId' => 'id'])]
        Task $task, 
        EntityManagerInterface $entityManager, 
        Request $request
        ): Response
    {
        $entityManager->remove($task);
        $entityManager->flush();

        $referer = $request->headers->get('referer');
        return $this->redirect($referer ?: '/');
    }
}
