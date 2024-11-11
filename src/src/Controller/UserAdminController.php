<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserAdminController extends AbstractController
{
  #[Route('/admin/users', name: 'app_admin_users')]
  public function index(UserRepository $userRepository): Response
  {
    $users = $userRepository->findAll();
    return $this->render('user_admin/index.html.twig', [
      'users' => $users,
    ]);
  }
}
