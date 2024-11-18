<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Location; // Add this line to import the Location class
use App\Form\AddLocationType;
use App\Form\LocationType; // Add this line to import the LocationType class
use Doctrine\ORM\EntityManagerInterface; // Add this line to import the EntityManagerInterface class


class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $location = new Location();

        $form = $this->createForm(AddLocationType::class, $location);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($location);
            $em->flush();

            $this->addFlash('success', 'Lokace byla úspěšně přidána!');
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/add-location', name: 'add_location')]
    public function addLocation(Request $request, EntityManagerInterface $em): Response
    {
        $location = new Location();
        $form = $this->createForm(AddLocationType::class, $location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $options = $form->get('options')->getData();
            if ($options) {
                $location->setOptions(json_decode($options, true));
            }
            $em->persist($location);
            $em->flush();

            $this->addFlash('success', 'Lokace byla úspěšně přidána!');
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
