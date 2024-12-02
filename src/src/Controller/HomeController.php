<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ServicesRepository;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request,EntityManagerInterface $entityManager,ServicesRepository $servicesRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest ($request);
        if ($form->isSubmitted() && $form->isValid()){ 
            $entityManager-> persist($contact);
            $entityManager-> flush();
            return $this-> redirectToRoute('app_home');
        }
        $services=$servicesRepository->find(1);
        return $this->render('home/index.html.twig', [
            'form' => $form,
            'services' => $services
        ]);
    }
}


  
