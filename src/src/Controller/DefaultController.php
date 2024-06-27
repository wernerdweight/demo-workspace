<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/rolling-stones', name: 'rolling_stones_home')]
    public function rollingStones(): Response
    {
        return $this->render('rolling_stones/index.html.twig');
    }
}
