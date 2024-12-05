<?php

namespace App\Controller;

use App\Entity\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Choice;
use App\Entity\Artefact;

class PageController extends AbstractController
{
    #[Route('/privacy', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('privacy.html.twig');
    }

    #[Route('/terms', name: 'terms')]
    public function terms(): Response
    {
        return $this->render('terms.html.twig');
    }

    #[Route('/game', name: 'game', methods: ['GET', 'POST'])]
    public function game(Request $request, EntityManagerInterface $em): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        // Zkontrolujeme, zda má uživatel pozici 0 (nová hra) nebo aktuální pozici
        $currentPosition = $user->getCurrentPosition() ?? '1';

        // Pokud je pozice 0, načteme výchozí pozici pro novou hru
        if ($currentPosition == '0') {
            $location = $em->getRepository(Location::class)->findOneBy(['position' => 0]);
        } else {
            $location = $em->getRepository(Location::class)->findOneBy(['position' => $currentPosition]);
        }

        if (!$location) {
            throw $this->createNotFoundException('Lokace nenalezena.');
        }

        $choices = $location->getChoices();

        $isEnding = $location->getEndingType();

        return $this->render('game.html.twig', [
            'text' => $location->getLocationText(),
            'choices' => $choices,
            'imagePath' => $location->getImagePath(),
            'artefacts' => $location->getArtefacts(),
            'isEnding' => $isEnding,
        ]);
    }

    #[Route('/start-new-game', name: 'start_new_game')]
    public function startNewGame(EntityManagerInterface $em): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        // Smazání všech artefaktů uživatele (ale artefakty zůstanou v databázi)
        foreach ($user->getArtefacts() as $artefact) {
            $user->removeArtefact($artefact); // Odstranit artefakt z uživatele
        }

        // Nastavíme pozici uživatele na 0 pro novou hru
        $user->setCurrentPosition(0);
        $em->flush();

        return $this->redirectToRoute('game');  // Po nové hře přesměrujeme na hru
    }

    #[Route('/move', name: 'move', methods: ['POST'])]
    public function move(Request $request, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);
        $choiceId = isset($data['choiceId']) ? (int)$data['choiceId'] : 0;

        $choice = $em->getRepository(Choice::class)->find($choiceId);

        if (!$choice) {
            throw $this->createNotFoundException('Volba nenalezena.');
        }

        $targetLocation = $choice->getToLocation();

        if (!$targetLocation) {
            throw $this->createNotFoundException('Cílová lokace nenalezena.');
        }

        /** @var User $user */
        $user = $this->getUser();
        if ($user->getCurrentPosition() !== $choice->getFromLocation()->getPosition()) {
            throw $this->createNotFoundException('Nezlob!');
        }
        if ($choice->getRequiredArtefact() && !$user->getArtefacts()->contains($choice->getRequiredArtefact())) {
            throw $this->createNotFoundException('Nemáš potřebný artefakt!');
        }
        $user->setCurrentPosition($targetLocation->getPosition());
        $em->flush();

        return $this->json([
            'text' => $targetLocation->getLocationText(),
            'choices' => array_map(function ($choice) {
                return [
                    'id' => $choice->getId(),
                    'choiceText' => $choice->getChoiceText(),
                    'toLocation' => [
                        'position' => $choice->getToLocation()->getPosition(),
                    ],
                ];
            }, $targetLocation->getChoices()->toArray()),
        ]);
    }

    #[Route('/collect', name: 'collect', methods: ['POST'])]
    public function collect(Request $request, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);
        $artefactId = isset($data['artefactId']) ? (int)$data['artefactId'] : 0;

        $artefact = $em->getRepository(Artefact::class)->find($artefactId);

        if (!$artefact) {
            throw $this->createNotFoundException('Artefakt nenalezen.');
        }

        /** @var User $user */
        $user = $this->getUser();
        if ($user->getCurrentPosition() !== $artefact->getLocation()->getPosition()) {
            throw $this->createNotFoundException('Nezlob!');
        }
        if ($user->getArtefacts()->contains($artefact)) {
            throw $this->createNotFoundException('Artefakt již máš!');
        }
        $user->addArtefact($artefact);
        $em->flush();

        return $this->json([
            'success' => true,
        ]);
    }
}
