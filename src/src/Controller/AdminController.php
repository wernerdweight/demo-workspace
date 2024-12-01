<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Location;
use App\Form\AddLocationType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Choice;
use App\Form\ChoiceType;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $location = new Location();
        $locationForm = $this->createForm(AddLocationType::class, $location);

        $choice = new Choice();
        $choiceForm = $this->createForm(ChoiceType::class, $choice);

        $locationForm->handleRequest($request);
        $choiceForm->handleRequest($request);

        if ($locationForm->isSubmitted() && $locationForm->isValid()) {
            $em->persist($location);
            $em->flush();

            $this->addFlash('success', 'Lokace byla úspěšně přidána!');
            return $this->redirectToRoute('app_admin');
        }

        if ($choiceForm->isSubmitted() && $choiceForm->isValid()) {
            $em->persist($choice);
            $em->flush();

            $this->addFlash('success', 'Volba byla úspěšně přidána!');
            return $this->redirectToRoute('app_admin');
        }

        $locations = $em->getRepository(Location::class)->findBy([], ['position' => 'ASC']);

        $choices = $em->getRepository(Choice::class)->findAll();

        $locationsData = [];
        foreach ($locations as $location) {
            $outgoingChoices = [];
            foreach ($choices as $choice) {
                if ($choice->getFromLocation() && $choice->getFromLocation()->getId() == $location->getId()) {
                    $outgoingChoices[] = $choice;
                }
            }

            $locationsData[] = [
                'id' => $location->getId(),
                'position' => $location->getPosition(),
                'locationText' => $location->getLocationText(),
                'parentId' => $location->getParent() ? $location->getParent()->getId() : null,
                'outgoingChoices' => $outgoingChoices,
            ];
        }

        return $this->render('admin/index.html.twig', [
            'locationForm' => $locationForm->createView(),
            'choiceForm' => $choiceForm->createView(),
            'locationsData' => $locationsData,
        ]);
    }


    #[Route('/admin/users', name: 'admin_users')]
    public function userList(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('admin/user_list.html.twig', [
            'users' => $users,
        ]);
    }
}
