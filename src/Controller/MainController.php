<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use App\Repository\GiteRepository;
use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(PictureRepository $pictureRepository, GiteRepository $giteRepository, CalendarRepository $calendar, Request $request): Response
    {
        $gites = $giteRepository->findAll();
        $pictures = $pictureRepository->findBy(['gite' => '1']);
        $pictures2 = $pictureRepository->findBy(['gite' => '2']);


        $events = $calendar->findBy(['gite' => '1']);
        $events2 = $calendar->findBy(['gite' => '2']);

        $rdvs = [];
        $rdv = [];

        foreach ($events as $event) {
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d'),
                'end' => $event->getEnd()->format('Y-m-d'),
                'backgroundColor' => $event->getBook(),
                'textColor' => '#FFFFFF',
                'display' => 'background',
                'allDay' => 'true'
            ];
        }
        $data = json_encode($rdvs);

        foreach ($events2 as $event2) {
            $rdv[] = [
                'id' => $event2->getId(),
                'start' => $event2->getStart()->format('Y-m-d'),
                'end' => $event2->getEnd()->format('Y-m-d'),
                'backgroundColor' => $event2->getBook(),
                'textColor' => '#FFFFFF',
                'display' => 'background',
                'allDay' => 'true'
            ];
        }
        $data2 = json_encode($rdv);

        return $this->render('main/index.html.twig', [
            'gite' => $gites,
            'data' => $data,
            'data2' => $data2,
            'pic1' => $pictures,
            'pic2' => $pictures2,

        ]);
    }

    #[Route('/maringotte', name: 'app_maringotte')]
    public function maringotte()
    {
        return $this->render('main/maringotte.html.twig');
    }
}
