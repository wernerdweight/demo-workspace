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
    // původní verze 
    //     #[Route('/game', name: 'game', methods: ['GET', 'POST'])]
    //     public function game(Request $request, EntityManagerInterface $em): Response
    //     {
    //         /** @var User $user */
    //         $user = $this->getUser();
    //         if ($request->isMethod('POST')) {
    //             $user->setCurrentPosition($request->request->get('position'));
    //             $em->flush();
    //             return $this->redirectToRoute('game');
    //         }

    //         $location = $em->getRepository(Location::class)->findOneBy([
    //             'position' => $user->getCurrentPosition() ?? '0',
    //         ]);

    //         $text = $location ? $location->getLocationText() : 'Text pro tuto lokaci nebyl nalezen.';
    //         $options = $location ? $location->getOptions() : [];

    //         return $this->render('game.html.twig', [
    //             'position' =>  $user->getCurrentPosition(),
    //             'text' => $text,
    //             'options' => $options,
    //         ]);
    //     }
    // }

    // nová verze 
    #[Route('/game', name: 'game', methods: ['GET', 'POST'])]
    public function game(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $currentPosition = $user->getCurrentPosition() ?? '0';

        $location = $em->getRepository(Location::class)->findOneBy(['position' => $currentPosition]);

        if (!$location) {
            throw $this->createNotFoundException('Lokace nenalezena.');
        }

        $choices = $location->getChoices();

        // Debug: Zkontrolujte hodnoty
        dump($choices);
        // die();

        return $this->render('game.html.twig', [
            'text' => $location->getLocationText(),
            'choices' => $choices,
        ]);
    }

    #[Route('/move', name: 'move', methods: ['POST'])]
    public function move(Request $request, EntityManagerInterface $em): Response
    {
        // Získání dat z JSON
        $data = json_decode($request->getContent(), true);
        $choiceId = isset($data['choiceId']) ? (int)$data['choiceId'] : 0;

        // Debug: Zkontrolujte přijatá data
        dump($choiceId);

        $choice = $em->getRepository(Choice::class)->find($choiceId);

        // Debug: Zkontrolujte nalezenou volbu
        dump($choice);
        // die();

        if (!$choice) {
            throw $this->createNotFoundException('Volba nenalezena.');
        }

        $targetLocation = $choice->getToLocation();

        if (!$targetLocation) {
            throw $this->createNotFoundException('Cílová lokace nenalezena.');
        }

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
