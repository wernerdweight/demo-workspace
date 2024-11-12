<?php

namespace App\Controller\Listing;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WorkListingController extends AbstractController
{
    #[Route('/listing/work', name: 'app_listing_work')]
    public function index(): Response
    {
        return $this->render('listing/work.html.twig', [

        ]);
    }
}
