<?php

namespace App\Controller;

use App\Entity\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

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
        if ($request->isMethod('POST')) {
            $user->setCurrentPosition($request->request->get('position'));
            $em->flush();
            return $this->redirectToRoute('game');
        }

        $location = $em->getRepository(Location::class)->findOneBy([
            'position' => $user->getCurrentPosition() ?? '0',
        ]);

        $text = $location ? $location->getLocationText() : 'Text pro tuto lokaci nebyl nalezen.';
        $options = $location ? $location->getOptions() : [];

        return $this->render('game.html.twig', [
            'position' =>  $user->getCurrentPosition(),
            'text' => $text,
            'options' => $options,
        ]);
    }
}

    // nová verze s direction
//     #[Route('/game', name: 'game', methods: ['GET', 'POST'])]
//     public function game(Request $request, EntityManagerInterface $em): Response
//     {
//         /** @var User $user */
//         $user = $this->getUser();
//         $currentPosition = $user->getCurrentPosition() ?? '0';

//         if ($request->isMethod('POST')) {
//             $direction = $request->request->get('direction');

//             // Vypočítej novou pozici na základě aktuální pozice a směru
//             $newPosition = $this->calculateNewPosition($currentPosition, $direction);

//             // Ulož novou pozici uživatele
//             $user->setCurrentPosition($newPosition);
//             $em->flush();

//             return $this->redirectToRoute('game');
//         }

//         // Načti lokaci pro aktuální pozici
//         $location = $em->getRepository(Location::class)->findOneBy([
//             'position' => $currentPosition,
//         ]);

//         $text = $location ? $location->getLocationText() : 'Text pro tuto lokaci nebyl nalezen.';
//         $options = $location ? $location->getOptions() : [];

//         return $this->render('game.html.twig', [
//             'position' => $currentPosition,
//             'text' => $text,
//             'options' => $options,
//         ]);
//     }

//     /**
//      * Vypočítá novou pozici na základě aktuální pozice a směru.
//      */
//     private function calculateNewPosition(string $currentPosition, string $direction): string
//     {
//         // Rozdělení aktuální pozice na části (např. "0.2" => ["0", "2"])
//         $parts = explode('.', $currentPosition);

//         switch ($direction) {
//             case 'north':
//                 $parts[] = '1'; // Přidej krok na sever
//                 break;
//             case 'south':
//                 $parts[] = '-1'; // Přidej krok na jih
//                 break;
//             case 'east':
//                 $parts[] = '1'; // Přidej krok na východ
//                 break;
//             case 'west':
//                 $parts[] = '-1'; // Přidej krok na západ
//                 break;
//             default:
//                 throw new \InvalidArgumentException('Neplatný směr: ' . $direction);
//         }

//         // Poskládání nové pozice
//         return implode('.', $parts);
//     }
// }
