<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Recepty;
use App\Entity\IngredienceReceptu;
use App\Entity\Ingredience;

class ReceptController extends AbstractController
{
    #[Route('/recepty/{nazev}', name: 'app_recept')]
public function index(ManagerRegistry $doctrine, string $nazev): Response
{
    $recipe = $doctrine->getRepository(Recepty::class)->findOneBy(['nazev' => $nazev]);

    if (!$recipe) {
        throw $this->createNotFoundException("Recipe with name '$nazev' not found.");
    }

    return $this->render('Recept/index.html.twig', [
        'nazev' => $recipe->getNazev(),
        'suroviny' => $recipe->getIngredience(),
        'postup' => $recipe->getPostup(),
        'imgpath' => $recipe->getImagepath(),
        'obtiznost' => $recipe->getObtiznost(),
    ]);
}

}
