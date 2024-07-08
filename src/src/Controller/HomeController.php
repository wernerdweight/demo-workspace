<?php

namespace App\Controller;

use App\Entity\FormEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
    if ($request->getMethod() === Request::METHOD_POST) {
        $ratings = $request->request->get('ratings');
        $formEntity = new FormEntity();
        $formEntity->setFormulary($ratings);

        $entityManager->persist($formEntity);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
    return $this->render('home/index.html.twig');
    }

}