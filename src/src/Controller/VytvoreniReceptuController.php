<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Recepty;
use App\Form\ReceptType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class VytvoreniReceptuController extends AbstractController
{
    #[Route('/vytvoreni/receptu', name: 'app_vytvoreni_receptu')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $recept = new Recepty();
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($recept, ...$recept->getIngredience());
            foreach ($recept->getIngredience() as $ingredienceReceptu) {
                $entityManager->persist($ingredienceReceptu);
            }
            $entityManager->flush();
            return $this->redirectToRoute('app_vytvoreni_receptu');
        }
        return $this->render('vytvoreni_receptu/index.html.twig', [
            'form' => $form,
        ]);
    }
}
