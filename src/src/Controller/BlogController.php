<?php

namespace App\Controller;

use App\Repository\BlogEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(BlogEntityRepository $blogEntityRepository): Response
    {
        $blogPosts = $blogEntityRepository -> findAll();
        return $this->render('blog/index.html.twig', [
            'posts' => $blogPosts,
        ]);
    }
}
