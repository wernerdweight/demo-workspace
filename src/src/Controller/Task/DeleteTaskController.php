<?php

namespace App\Controller\Task;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class DeleteTaskController extends AbstractController
{
    #[Route('/task/delete', name: 'app_task_delete')]
    public function index(): Response {
        return $this->redirectToRoute('app_home');
    }
}
