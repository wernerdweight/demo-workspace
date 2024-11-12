<?php

namespace App\Controller\Listing;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PersonalListingController extends AbstractController
{
    #[Route('/listing/personal/', name: 'app_listing_personal')]
    public function index(): Response
    {
        return $this->render('listing/personal.html.twig', [

        ]);
    }
}
