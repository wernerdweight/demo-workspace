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
        $currentPosition = $user->getCurrentPosition() ?? '0';

        $location = $em->getRepository(Location::class)->findOneBy(['position' => $currentPosition]);

        if (!$location) {
            throw $this->createNotFoundException('Lokace nenalezena.');
        }

        $choices = $location->getChoices();


        return $this->render('game.html.twig', [
            'text' => $location->getLocationText(),
            'choices' => $choices,
        ]);
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
}
