<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EventRepository;

class EventController extends AbstractController
{
    #[Route('/akce', name: 'app_events')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();
        return $this->render('event/index.html.twig', [
            'events' => $events,
        ]);
    } 
}
