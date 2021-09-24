<?php

namespace App\Controller;

use App\Entity\GuestRooms;
use App\Form\GuestRoomsType;
use App\Repository\GuestRoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/guest/rooms")
 */
class GuestRoomsController extends AbstractController
{
    /**
     * @Route("/", name="guest_rooms_index", methods={"GET"})
     * @param GuestRoomsRepository $guestRoomsRepository
     * @return Response
     */
    public function index(GuestRoomsRepository $guestRoomsRepository): Response
    {
        return $this->render('guest_rooms/index.html.twig', [
            'guest_rooms' => $guestRoomsRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}/edit", name="guest_rooms_edit", methods={"GET","POST"})
     * @param Request $request
     * @param GuestRooms $guestRoom
     * @return Response
     */
    public function edit(Request $request, GuestRooms $guestRoom): Response
    {
        $form = $this->createForm(GuestRoomsType::class, $guestRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('guest_rooms_index');
        }

        return $this->render('guest_rooms/edit.html.twig', [
            'guest_room' => $guestRoom,
            'form' => $form->createView(),
        ]);
    }
}
