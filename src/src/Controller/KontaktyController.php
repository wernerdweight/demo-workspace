<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recenze;
use Symfony\Bundle\SecurityBundle\Security;

class KontaktyController extends AbstractController
{
    #[Route('/recenze', name: 'app_kontakty', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, Security $security): Response
    {
        // Get the logged-in user
        $user = $security->getUser();
        $email = $user ? $user->getEmail() : null; // Assuming User entity has `getEmail()`

        if ($request->isMethod('POST')) {
            $review = $request->request->get('review');

            if ($email && $review) {
                $recenze = new Recenze();
                $recenze->setOsoba($email);
                $recenze->setRecenze($review);

                $entityManager->persist($recenze);
                $entityManager->flush();

                $this->addFlash('success', 'Your review has been submitted successfully!');
            } else {
                $this->addFlash('error', 'Review text is required!');
            }
        }

        return $this->render('kontakty/index.html.twig', [
            'user_email' => $email,
        ]);
    }
}