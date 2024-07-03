<?php

namespace App\Controller;
use App\Entity\MessageField;
use App\Form\MessageFieldType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactsController extends AbstractController
{
    #[Route('/contacts', name: 'app_contacts')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    
    {
        $message=new MessageField();
        $form = $this->createForm(MessageFieldType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($message);
            $entityManager->flush();
            return $this->redirectToRoute('app_contacts');
        }
        return $this->render('contacts/index.html.twig', [
            'form' => $form
        ]);
    }
}